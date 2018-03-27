<?php include_once 'header.php'; 
include_once '../model/index.php';
include_once '../controller/common_functions.php';
$expense_id = "18";// enter expense number for diesel 
// $id = "10";
$id = $_GET['id'];

$running_entry_list = $wpdb->get_results("SELECT * FROM running_entry  where vehicle_number = $id",ARRAY_A);
$monthly_running_entry   = $wpdb->get_results("SELECT *,from_date as date FROM monthly_running_entry  where vehicle_id = $id",ARRAY_A);
$expense_entry   = $wpdb->get_results("SELECT * FROM expense_entry  where vehicle_number = $id && expense=$expense_id",ARRAY_A); 
$halt_entry   = $wpdb->get_results("SELECT *,reason as description FROM halt_entry  where vehicle_no = $id ",ARRAY_A);

if (!empty($monthly_running_entry)) {
	// get monthly halt reason
	foreach ($monthly_running_entry as $key => $value) {
		$halt = unserialize($value['halt']);
		foreach ($halt as $key => $value) {
		$monthly_halt[] = array('date'=>$value['datefrom'],'description'=>$value['halt_reason']." ( ".date('d-m-Y',strtotime($value['datefrom']))." - ".date('d-m-Y',strtotime($value['dateto']))." ) ");
		}
	}
}else{
	$monthly_halt=array();
}
$entry_data = array_merge_recursive($running_entry_list,$monthly_running_entry,$expense_entry,$halt_entry,$monthly_halt); 
foreach($entry_data as $arrKey) {
  $arrKeysDate[] = $arrKey['date'];
}
array_multisort($arrKeysDate, SORT_ASC, $entry_data);
?>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
	            <h4>
	                <center>Vehicle Report</center>
	            </h4>
		        <?php if(!empty($entry_data)){ ?>
				<div class="box-body">
		            <div class="table-responsive">
	          	    <div class="col-md-3">
	                    <input type="text" id="min" placeholder="From" class="form-control" style="width:242px">
	                    </div>
	                    <div class="col-md-3">
	                    <input type="text"  id="max" placeholder="To" class="form-control" style="width:242px">
	                    </div>
	                    <div class="col-md-3">
	                    <input type="button" value="search" id="test" class="btn btn-primary">
	                </div> <br /><br />

		              <table  class="table table-bordered table-striped view_vehicle_report">
		                <thead>
		                  <tr>
		                    <th>Date</th>
		                    <th>Starting Time</th>
		                    <th>Ending Time</th>
		                    <th>Working Hour</th>
		                    <th>Difference</th>
		                    <th>Location</th>
		                    <th>Discription</th>
		                    <th>Diesel</th>
		                  </tr>
		                </thead>
		                <tfoot>
		                    <tr>
		                        <th colspan="3" style="text-align:right">Total:</th>
		                        <th></th>
		                        <th></th>
		                        <th></th>
		                        <th></th>
		                        <th></th>
		                    </tr>
		                </tfoot>
		                <tbody>
		                <?php 
		                $working_difference = "";$end_time = "";
	                  foreach ($entry_data as $key => $value) {
	                  			$working_difference=$value['starting_time']-$end_time;
	                  			
	                  	echo "<tr>
	                          	<td>".date('d-m-Y',strtotime($value['date']))."</td>
	                          	<td>".$value['starting_time']."</td>
	                          	<td>".$value['ending_time']."</td>
	                          	<td>".$value['working_hour']."</td>";
	                          	if ($value['ending_time']) {
	                          		# code...
	                          	echo "<td>".round($working_difference,2)."</td>";
	                          	}else{
	                          		echo "<td></td>";
	                          	}
	                          	echo "<td>".$value['location']."</td>
	                      		<td>".$value['description']."</td>
	                  			<td>".$value['quantity']."</td>";
	                  			if ($value['ending_time']) {
	                  				$end_time = $value['ending_time'];
	                  			}

	                  	echo "</tr>";
	                  }?> 
		                </tbody>
		              </table>
		            </div>
		          </div>
				<?php }else{
				    echo "<blockquote><p>No Report till now!!</p></blockquote>";
				} ?>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
  $(".view_data_table").DataTable({
     "order":[],
  });
</script>





<script type="text/javascript">
      $(document).ready( function () {
          $.fn.dataTable.ext.search.push(
              function( settings, data, dataIndex ) {
                  var min = $('#min').val();
                  var max = $('#max').val();
                  var date =  data[0]; // use data for the age column
                  var data_table_date = date.split("-");
                  var table_date = data_table_date[0];
                  var table_month = data_table_date[1];
                  var table_year = data_table_date[2];
                  var table_date_final  = table_year + '-' + table_month + '-' + table_date;
                  
                  var minimum  = min.split("-");
                  var min_date = minimum[0];
                  var min_month = minimum[1];
                  var min_year = minimum[2];
                  var minimum_date = min_year + '-' + min_month + '-' + min_date;

                  var maximum  = max.split("-");
                  var max_date = maximum[0];
                  var max_month = maximum[1];
                  var max_year = maximum[2];
                  var maximum_date = max_year + '-' + max_month + '-' + max_date;
                  // console.log(table_date_final);
                  

                  if((min == '' && max == '') ||
                    (min == '' &&  table_date_final <= maximum_date )  ||
                    (minimum_date <= table_date_final && '' == max) ||
                    (minimum_date <= table_date_final && table_date_final <= maximum_date))
                  {
                  return true;
                  }
                  return false;
              }
          );

            var table = $('.view_vehicle_report').DataTable({
              "order":[],
              "footerCallback": function ( row, data, start, end, display ) {
		            var api = this.api(), data;
		            
		           // Remove the formatting to get integer data for summation
		            var intVal = function ( i ) {
		                return typeof i === 'string' ?
		                    i.replace(/[\$,]/g, '')*1 :
		                    typeof i === 'number' ?
		                        i : 0;
		            };
		 
		            // Total over all pages
		            total = api
		                .column( 7 )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		                // console.log(total);
		 
		            // // Total over this page
		            pageTotal = api
		                .column( 7, { page: 'current'} )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		 
		            // Update footer
		            $( api.column( 7 ).footer() ).html(
		                ''+pageTotal +' ( '+ total +' litter)'
		            );

// 3
		            var intVal = function ( i ) {
		                return typeof i === 'string' ?
		                    i.replace(/[\$,]/g, '')*1 :
		                    typeof i === 'number' ?
		                        i : 0;
		            };
		 
		            // Total over all pages
		            total = api
		                .column( 3 )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		                // console.log(total);
		 
		            // // Total over this page
		            pageTotal = api
		                .column( 3, { page: 'current'} )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		 
		            // Update footer
		            $( api.column( 3 ).footer() ).html(
		                ''+pageTotal.toFixed(2) +' ( '+ total.toFixed(2) +' hours)'
		            );
	            // 4
		            var intVal = function ( i ) {
		                return typeof i === 'string' ?
		                    i.replace(/[\$,]/g, '')*1 :
		                    typeof i === 'number' ?
		                        i : 0;
		            };
		 
		            // Total over all pages
		            total = api
		                .column( 4 )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		                // console.log(total);
		 
		            // // Total over this page
		            pageTotal = api
		                .column( 4, { page: 'current'} )
		                .data()
		                .reduce( function (a, b) {
		                    return intVal(a) + intVal(b);
		                }, 0 );
		 
		            // Update footer
		            $( api.column( 4 ).footer() ).html(
		                ''+pageTotal.toFixed(2) +' ( '+ total.toFixed(2) +' hours)'
		            );


		        },


      
                    dom: 'lBfrtip',
                      lengthMenu: [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
                       pageLength: 10,
                       responsive: true,
                      columnDefs: [{ type: 'date-dd-mmm-yyyy', targets: 0 }],
                      buttons: [
                           {
                              extend: 'excelHtml5',
                              filename: '<?php echo get_vehicle_delails($id,$wpdb)['vehicle_number'];?> Vehicle Report',
                              title:'<?php echo get_vehicle_delails($id,$wpdb)['vehicle_number'];?> Vehicle Report',
                               footer: true  
                          },
                          {
                              extend: 'pdfHtml5',
                              filename: '<?php echo get_vehicle_delails($id,$wpdb)['vehicle_number'];?> Vehicle Report',
                              title: '<?php echo get_vehicle_delails($id,$wpdb)['vehicle_number'];?> Vehicle Report',
                               footer: true
                          },
                          {
                              extend: 'print',
                              title: '<?php echo get_vehicle_delails($id,$wpdb)['vehicle_number'];?> Vehicle Report',
                               footer: true
                          }
                    ]
            });
           $('.dt-buttons a').addClass('btn btn-info btn-sm');

            $('#test').click( function() {
                table.draw();
            });

         //Date Picker 
            $("#min").datepicker({
                onSelect: function(currDate) {
                    $("#status").html("Selected date: " + currDate);
                },
                dateFormat: 'dd-mm-yy'
            });
            $("#max").datepicker({
                onSelect: function(currDate) {
                    $("#status").html("Selected date: " + currDate);
                },
                dateFormat: 'dd-mm-yy'
            });   
   });
        </script> 
<?php include_once 'footer.php'; ?>