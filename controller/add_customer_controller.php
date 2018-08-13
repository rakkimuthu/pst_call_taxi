<?php
if (!empty($_POST)) {
	$phone_number = serialize($_POST['phone_number']);
	$customer_data=array('customer_name'=>$_POST['customer_name'],'phone_number'=>$phone_number);
	include_once '../model/index.php';
	if($wpdb->insert('customer',$customer_data)){
		header("location:../view/customers.php?status=inserted&slug=Customer");
	}else{
		header("location:../view/customers.php?status=inserted&slug=Customer");
	}
}else{
	header("location:../view/customers.php?status=inserted&slug=Customer");
}
?>

