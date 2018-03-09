<?php 
	include_once 'header.php';
    include_once '../model/index.php'; 
    $vehicles = $wpdb->get_results("SELECT * FROM vehicles",ARRAY_A);
  

 ?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
      		<div class="box box-info">
        		<div class="box-header">
	        	<h4>
	          	 <center>Vehicles List</center>
	        	</h4>
                <a href="add_vehicles.php" class="btn btn-info pull-right add-vehicle">Add</a>
			    </div>
	            <div class="box-body">
		            <div class="table-responsive">
		             	<table  class="table table-bordered table-striped view_entry_table">
		                <thead>
			                <tr>
			                   <th>Vehicle Number</th>
			                   <th>Model Number</th>
			                   <th>Insurance-Renewal</th>
			                   <th>FC-Renewal</th>
			                   <th>Tax-Renewal</th>
			                   <th>Remain_date</th>
			                   <th>Action</th>
			                </tr>
		                </thead>
		                <body>
		                	<?php foreach ($vehicles as $key => $vehicle) {	?>
					<tr>
						<td><?php echo $vehicle['vehicle_number'] ?></td>
						<td><?php echo $vehicle['model_number'] ?></td>
						<td><?php echo $vehicle['insurance'] ?></td>
						<td><?php echo $vehicle['fc_renewal'] ?></td>
						<td><?php echo $vehicle['tax_date'] ?></td>
						<td><?php echo $vehicle['remain_date'] ?></td> 
						<td>
							<a href="edit_vehicles.php?id=<?php echo $vehicle['id']?>"><button type="button" class="btn btn-warning ">edit</button>
							 <a href="../controller/delete_vehicle_controller.php?id=<?php echo $vehicle['id'] ?>"><button type="button" class="btn btn-danger">delete</button> 
						</td>
					</tr>	
					<?php }?>
		               	</table>
		            </div>
	            </div>
  			</div>
    	</div>
	</div>
      
<?php include_once 'footer.php'; ?>