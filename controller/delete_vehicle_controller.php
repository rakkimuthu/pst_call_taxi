<?php  
  include_once '../model/index.php';
$id=$_GET['id'];
$where = array('id'=>$id);
$delete = $wpdb->delete('vehicles',$where);
if($delete){
	header("location:../view/vehicles.php?status=success");

}else{
	echo "error";
}