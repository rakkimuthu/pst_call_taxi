<?php 
	include_once 'header.php';
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
								<input type="number" maxlength="10" minlength="10" class="form-control" id="inputEmail3" placeholder="Phone Number" name="phone_number" required>
							</div>
						</div>   

						<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Vehicle Number</label>  
							<div class="col-sm-5">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Vehicle Number" name="vehicle_number">
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