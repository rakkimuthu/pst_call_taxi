<?php include_once 'header.php';
include_once '../model/index.php';
include_once '../controller/common_function.php';
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

<!-- ===========
Entry Form start
================= -->
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
				<select name="vehicle_id" class="form-control" id="vehicles" required>
				<option value="">Select Vehicle</option>
				<?php foreach ($vehicles as $key => $vehicle) { ?>
				<option value="<?php echo $vehicle['id'] ?>"><?php echo $vehicle['vehicle_name'] ?></option>
				<?php } ?>  
				</select>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<label>Driver Name:</label>
				<select name="driver_id" class="form-control" id="driver" required>
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
				<input type="number" min="0" class="form-control calculate_value" id="starting_km" placeholder="Starting KM" name="starting_km" required>
			</div>

			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Ending KM:</label>
				<input type="number" id="ending_km" min="0" class="form-control calculate_value" placeholder="Ending KM" name="ending_km" required>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Total KM:</label>
				<input type="number" min="0" class="form-control calculate_value" id="total_km" placeholder="Total KM" name="total_km" readonly required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Starting Time:</label>
				<input type="datetime-local" value="<?php echo date("Y-m-d\T00:00")?>" class="form-control calculate_value" placeholder="Starting Time" name="starting_time" required>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Ending Time:</label>
				<input type="datetime-local" value="<?php echo date("Y-m-d\TH:i")?>" class="form-control calculate_value" placeholder="Ending Time" name="ending_time" required>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Total Time:</label>
				<input type="text" id="total_time" class="form-control calculate_value" placeholder="Total Time" name="total_time" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Type:</label>
				<select class="form-control calculate_value" required name="type" id="type">
					<option value="">Select Type</option>
					<option value="ac">AC</option>
					<option value="non_ac">Non AC</option>
				</select>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Extra Amount</label>
				<input type="number" id="extra_amount" value="0" class="form-control calculate_value" placeholder="Extra Time" name="extra_amount" >
			</div>
			<div class="col-md-4 col-sm-3 col-xs-4">
				<label>Bill Amount: (₹)</label>
				<input type="number" id="bill_amount" class="form-control calculate_value" placeholder="Bill Amount" name="bill_amount" readonly>
			</div>
		</div>
		<div class="box-footer" align="center">
			<input type="submit" class="btn btn-info" name="save" value="save">
			<input type="submit" class="btn btn-info" name="submit" value="submit">
			<!-- <input type="reset" class="btn btn-info" value="clear"> -->
		</div>
	</div>
</form>		
<!--========
	Entry Form End
===========  -->


	<hr>
      <h4>
     	 <center>Entry List</center>
      </h4>

        <?php 
$entry_detail = $wpdb->get_results("SELECT * FROM entry WHERE status = '1'",ARRAY_A);
// echo "<pre>";
// print_r($entry_detail);
        if(!empty($entry_detail)){ ?>
          <div class="box-body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                  	<th>Date</th>
                    <th>Customers</th>
                    <th>Vehicle No</th>
                    <th>Bill Amount: (₹)</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php 
                    foreach ($entry_detail as $key => $value) { 
	              	echo '<tr>
	              		  <td>'.$value['date'].'</td>
	                      <td>'.get_customers($value['customer_id'],$wpdb)['customer_name'].'</td>
	                      <td>'.get_vehicle_number($value['vehicle_id'],$wpdb)['vehicle_name'].'</td>
	                      <td>'.$value['bill_amount'].'</td>';?>
                    		<td><a href="edit_entry.php?id=<?php echo $value['id']?>"><button type="button" class="btn btn-warning">Edit</button></a>
                           <a href="../controller/delete_entry_controller.php?id=<?php echo $value['id']?>">  <button type='button' class='btn btn-danger'>Delete</button></a>
                       </td>
	                  </tr>
	               <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

      <?php }else{
          echo "<blockquote><p>No Entry List till now added!!</p></blockquote>";
      } ?>










			</div>
		</div>
	</div>
</div>

 <?php include_once 'footer.php'; ?>
<script type="text/javascript">
$(document).ready(function() {
	var dataSrc = [<?php echo get_location($wpdb); ?>];
    $(".location_search").autocomplete({
        source:dataSrc
    });
});
</script>