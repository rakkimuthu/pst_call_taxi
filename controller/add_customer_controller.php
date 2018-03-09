	<?php
echo "<pre>";
print_r($_POST);
// print_r(implode(',', $_POST['phone_number']));
$phone_number = serialize($_POST['phone_number']);
$customer_data=array('customer_name'=>$_POST['customer_name'],'phone_number'=>$phone_number);
// print_r($customer_data);



include_once '../model/index.php';
// if(!empty($_POST['customer_name'] && $_POST['phone_number'])){
// 	$customers = array('customer_name'=>$_POST['customer_name'],'phone_number'=>$_POST['phone_number'],'balance_amount'=>'0');
// 	$customers = array_map('strtoupper', $customers);
	if($wpdb->insert('customer',$customer_data)){
		header("location:../view/customers.php");
	}else{
		echo "error";

	}
 ?>

