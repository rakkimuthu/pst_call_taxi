<?php include_once 'header.php';
include_once '../model/index.php';
$customers = $wpdb->get_results("SELECT * FROM customer ORDER BY customer_name",ARRAY_A);
$vehicles = $wpdb->get_results("SELECT * FROM vehicles",ARRAY_A);
$drivers = $wpdb->get_results("SELECT * FROM drivers ORDER BY driver_name",ARRAY_A);

// echo "<pre>";
// print_r($customers);

?>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
				<h4>
					<center>Entry</center>
				</h4>


<form class="form-horizontal" method="post" action="../controller/add_entry_controller.php">
	<div class="box-body">
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<label>Date:</label> 
				<input type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date" required>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-6">
				<label>Customers:</label>
				<select class="form-control" name="customer_id" required>
				<option value="">Select Customer</option>
				<?php foreach ($customers as $key => $customer) { ?>
				<option value="<?php echo $customer['id'] ?>"><?php echo $customer['customer_name'] ?></option>
				<?php } ?>   
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<label>Vehicle Number:</label>
				<select name="vehicle_id" class="form-control" required>
				<option value="">Select Vehicle</option>
				<?php foreach ($vehicles as $key => $vehicle) { ?>
				<option value="<?php echo $vehicle['id'] ?>"><?php echo $vehicle['vehicle_number'] ?></option>            
				<?php } ?>  
				</select>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<label>Driver Name:</label>
				<select name="driver_id" class="form-control" required>
				<option value="">Select Driver</option>
				<?php foreach ($drivers as $key => $driver) { ?>
				<option value="<?php echo $driver['id'] ?>"><?php echo $driver['driver_name'] ?></option>            
				<?php } ?>  
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<label> Starting Location:</label>
				<input type="text" class="form-control location_search" placeholder="Starting Location" name="starting_location" required>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<label> Destination Location:</label>
				<input type="text" class="form-control location_search" placeholder="Destination Location" name="destination_location" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Starting KM:</label>
				<input type="number" step="0.01" min="0" class="form-control calculate_value" id="starting_km" placeholder="Starting KM" name="starting_km" required>
			</div>

			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Ending KM:</label>
				<input type="number" id="ending_km" step="0.01" min="0" class="form-control calculate_value" placeholder="Ending KM" name="ending_km" required>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Total KM:</label>
				<input type="number" step="0.01" min="0" class="form-control calculate_value" id="total_km" placeholder="Total KM" name="total_km" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Starting Time:</label>
				<input type="number" min="0" class="form-control calculate_value" placeholder="Starting Time" name="starting_time" required>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Ending Time:</label>
				<input type="number" min="0" class="form-control calculate_value" placeholder="Ending Time" name="ending_time" required>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Total Time:</label>
				<input type="number" min="0" id="total_time" class="form-control calculate_value" placeholder="Total Time" name="total_time" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>On Site Advance: (₹)</label>
				<input type="number" min="0" class="form-control calculate_value" placeholder="Site Advance" name="advance_payment" required>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Bill Amount: (₹)</label>
				<input type="number" id="bill_amount" class="form-control calculate_value" placeholder="Bill Amount" name="bill_amount" readonly>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Bill Amount: (₹)</label>
				<input type="number" id="balance_amount" class="form-control calculate_value" placeholder="Balance Amount" name="balance_amount" readonly>
			</div>
		</div>
		<div class="box-footer" align="center">
			<input type="submit" class="btn btn-info" value="submit">
			<input type="reset" class="btn btn-info" value="clear">
		</div>
	</div>
</form>		
				
			</div>
		</div>
	</div>
</div>

 <?php include_once 'footer.php'; ?>