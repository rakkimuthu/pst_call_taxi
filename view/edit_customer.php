<?php 
  include_once 'header.php';
  include_once '../model/index.php';
  $id=$_GET['id'];
  $customer_list = $wpdb->get_results("SELECT * FROM customer where id='$id' ",ARRAY_A);
  // print_r($customer_list);
?>
     
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
            <div class="box box-info">
              <div class="box-header">
                <h3>customers</h3>
                  <form method="post" action="../controller/update_customer_controller.php?id=<?php echo $customer_list[0]['id']?>">
                  <div class="form-group col-sm-7">
                      <label for="email">Name:</label>
                      <input type="text" class="form-control" id="name" name="customer_name" value="<?php echo $customer_list[0]['customer_name'];?>">
                  </div>
                  <?php
                  $var1 = unserialize($customer_list[0]['phone_number']);
                  foreach ($var1 as $key => $value1) { 
                    ?>
                  <div class="form-group col-sm-7">
                      <label for="email">Phone No:</label>
                      <input type="number" minlength="10" maxlength="10" class="form-control phone_no" id="phone_no" name="phone_number[]" value= "<?php echo $value1 ?>">
                  </div>
                     
                  <?php }
                  ?>
                  <div class="col-sm-7">
                    <button type="submit" id="submit" class="btn btn-info pull-right" data-dismiss="modal">Update Customer</button>
                  </div>
                </form>
              </div>
            </div>
        </div>  
    </div> 
</div>  
<?php include_once 'footer.php'; ?>
 