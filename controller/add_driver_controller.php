<?php 
include_once '../model/index.php';
$drivers=$wpdb->insert('drivers',$_POST);

if($drivers){
	header("location:../view/drivers.php");
}else{
	echo "error";
}

?>