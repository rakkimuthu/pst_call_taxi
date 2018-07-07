<?php 
    include_once 'header.php';
    include_once '../model/index.php';
    $vehicles = $wpdb->get_results('SELECT * FROM vehicles', ARRAY_A);
 ?>

<!-- Add Vehicle Model -->
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
           <div class="box box-info">
               <div class="box-header">
                <h3>Drivers</h3>
				<form class="form-horizontal"  method="post" action="../controller/add_driver_controller.php">
					<div class="box-body">
						<div class="form-group ">
								<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Driver Name" name="driver_name" required>
							</div>
						</div>   
						<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label"> Phone Number</label>  
							<div class="col-sm-5">
								<input type="text" maxlength="10" minlength="10" class="form-control phone_no" id="inputEmail3" placeholder="Phone Number" name="phone_number" required>
							</div>
						</div>   

						<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Vehicle Number</label>  
							<div class="col-sm-5">
							<select name="vehicle_id" class="form-control" required>
								<option value="">Select Vehicle</option>
								<?php foreach ($vehicles as $key => $vehicle) {
     ?>
								<option value="<?php echo $vehicle['id'] ?>"><?php echo $vehicle['vehicle_name'] ?></option>            
							<?php
 } ?>  
						    </select>
							</div>
						</div> 
						 
					</div>
					<div class=" col-sm-7">
						<button type="submit" id="add_new_vehicle"  class="btn btn-info pull-right">Add Vehicle</button>
					</div>
				</form>
			    </div>
		    </div>
		</div>
	</div>
</div>


 <?php include_once 'footer.php'; ?>