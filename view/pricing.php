<?php 
	include_once 'header.php';
	include_once '../model/index.php';
	$column_names = $wpdb->get_results("SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'pricing_master'  ORDER BY ORDINAL_POSITION",ARRAY_A);
  unset($column_names['0']);
  unset($column_names['1']);
  unset($column_names['2']);
   unset($column_names['3']);

	
 ?>

<div id="add_master_pricing" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Pricing Details</h4>
			</div>
		<div class="modal-body">
			<form class="form-horizontal" id="#" method="post" action="../controller/add_master_pricing.php">
				<div class="box-body">
					<div class="form-group">
						<label>Hours</label>
						<input type="text" class="form-control" id="" maxlength="2" pattern="\d*" placeholder="Enter The Hours" name="hours" required="">
					</div>
				<div class="form-group">
					<label>Kilo Meter</label>
					<input type="text" maxlength="4"  pattern="\d*" class="form-control" placeholder="Kilo Meter" name="kilo_meter" required>
				</div>
				</div>
			<div class="box-footer">
				<button type="submit"  class="btn btn-info pull-right">Add New Pricing</button>
			</div>
			</form>
		</div>
		</div>
	</div>
</div>
 <!-- View Customer Details Model -->
<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-info">
      <div class="box box-info">
        <div class="box-header">
          <h4>
          <center>Pricing Master List</center>
        </h4>
            <a class="btn btn-info pull-right" data-toggle="modal" data-target="#add_master_pricing">Add</a>
        </div>
          <div class="box-body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped view_entry_table">
                <thead>
                  <tr>
                    <th>Pricing List</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($column_names as $key => $value) { ?>
                      <tr>
                          <td><?php echo $value['column_name'] ?></td>
                          
                          <td><a href="edit_column_name.php?column_name=<?php echo $value['column_name']; ?>" class="btn"><i class="fa fa-pencil text-aqua "></i></a><a href="../controller/drop_column_controller.php?column_name=<?php echo $value['column_name']; ?>"  class="btn" style="margin-left: 2px"><i class="fa fa-trash-o"></i></a></td>
                      </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>
</div> 

 <?php include_once 'footer.php'; ?>