<?php
include_once '../model/index.php';
$drivers_data=array('driver_name'=>$_POST['driver_name'],'phone_number'=>$_POST['phone_number'],'vehicle_number'=>$_POST['vehicle_number']);
	if ($wpdb->update('drivers',$drivers_data,array('id'=>$_GET['id']))) {
		header("location:../view/drivers.php?status=success");
	}else{
		header("location:../view/drivers.php?status=error");
	}
?>