<?php  
  include_once '../model/index.php';
$id=$_GET['id'];
$where = array('id'=>$id);
$delete = $wpdb->delete('drivers',$where);
if($delete){
	header("location:../view/drivers.php?status=success");

}else{
	echo "error";
}