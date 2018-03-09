 
<?php
 
  include_once 'header.php';
  include_once '../model/index.php';

$customer_list = $wpdb->get_results("SELECT * FROM customer ORDER BY customer_name",ARRAY_A);
?> 


<!-- view customer -->
<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-info">
      <div class="box box-info">
        <div class="box-header">
          <h4>
          <center>Customers List</center>
          </h4>
             <a href="add_customers.php"  class="btn btn-info btn-lg  pull-right">Add</a>
        </div>
        <?php if(!empty($customer_list)){ ?>
          <div class="box-body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php 
                    foreach ($customer_list as $key => $value) { 
                  	// print_r($value);
                  	$var1 = unserialize($value['phone_number']);
					 // print_r ($var1);
					
	              	?>
	                  <tr>
	                      <td><?php echo $value['customer_name'] ?></td>

	                      <td>
	                      <?php foreach ($var1 as $key => $value1) {
	                      	print_r("$value1".",");
	                      } ?>
	                      </td>
	                        

		                    <td><a href="edit_customer.php?id=<?php echo $value['id']?>">  <button type='button' class='btn btn-warning'>Edit</button></a>
	                           <a href="../controller/delete_customer_controller.php?id=<?php echo $value['id']?>">  <button type='button' class='btn btn-danger'>Delete</button></a>
	                           </td>
	                      
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

 <!-- Delete Customer -->
<!-- <div class="modal fade" id="delete_model" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are You Sure ! You Want to Delete Customer </h4>
      </div>
      <div class="modal-body">
          <form action="../controller/delete_customer_controller.php">
            <button type="submit" id="delete_customer" class="btn btn-danger" data-dismiss="modal">Delete </button>
            <button type="button" style="float: right;" class="btn btn-default" data-dismiss="modal">Close</button>
          </form>
      </div>
    </div>
  </div>
</div>
 -->


<?php }else{?>
    <blockquote><p>No Customer till now added!!</p></blockquote>
<?php } ?>

<?php include_once 'footer.php'; ?>
