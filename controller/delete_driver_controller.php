<?php  
  include_once '../model/index.php';
$id=$_GET['id'];
$where = array('id'=>$id);
if($wpdb->delete('drivers',$where)){
	header("location:../view/drivers.php?status=success");

}else{
	header("location:../view/drivers.php?status=error");
}