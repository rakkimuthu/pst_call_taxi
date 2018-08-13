<?php 
	include_once 'header.php';
	include_once '../controller/common_function.php';
	include_once '../model/index.php';
 ?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
      		<div class="box box-info">
	        	<h4>
	          	 <center>View Entry List</center>
	        	</h4>
				<?php
			    	$entry_detail = $wpdb->get_results("SELECT * FROM entry WHERE status = '0' order by id desc",ARRAY_A);
			        if(!empty($entry_detail)){ ?>
			          <div class="box-body">
			            <div class="table-responsive">
			              <table  class="table table-bordered table-striped"  id="view_table_detail">
			                <thead>
			                  <tr>
			                  	<th>Date</th>
			                    <th>Customers</th>
			                    <th>Vehicle No</th>
			                    <th>Bill Amount: (₹)</th>
			                    <th>Delete</th>

			                  </tr>
			                </thead>
			                <tbody>
			                	<?php 
			                    foreach ($entry_detail as $key => $value) { 
				              	echo '<tr>
				              		  <td>'.date('d-m-Y',strtotime($value['date'])).'</td>
				                      <td>'.get_customers($value['customer_id'],$wpdb)['customer_name'].'</td>
				                      <td>'.get_vehicle_number($value['vehicle_id'],$wpdb)['vehicle_name'].'</td>
				                      <td>'.$value['bill_amount'].'</td>
				                      <td><a href="../controller/delete_view_entry.php?id='.$value['id'].'"><button class="btn btn-danger">Delete</button></a></td>
			                    	</tr>';
				               	} ?>
			                </tbody>
			              </table>
			            </div>
			          </div>
			      <?php }else{
			          echo "<blockquote><p>No Entry till now added!!</p></blockquote>";
			      } ?>
		    </div>
		</div>
	</div>
</div>
 <?php include_once 'footer.php'; ?>