<?php 
include_once '../model/index.php';
$vehicles=$wpdb->insert('vehicles',$_POST);

if($vehicles){
	header("location:../view/vehicles.php");
}else{
	echo "error";
}

?>