<?php
include_once '../model/index.php';
print_r($_POST);
$drivers_data=array('driver_name'=>$_POST['driver_name'],'phone_number'=>$_POST['phone_number'],'vehicle_number'=>$_POST['vehicle_number']);

$where = array('id'=>$_GET['id']);
$update = $wpdb->update('drivers',$drivers_data,$where);
if ($update) {
	header("location:../view/drivers.php?status=success");
}else{
	header("location:../view/drivers.php?status=error");
}





?>