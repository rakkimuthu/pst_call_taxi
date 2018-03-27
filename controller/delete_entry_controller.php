<?php  
 include_once '../model/index.php';
$where = array('id'=>$_GET['id']);
if($wpdb->delete('entry',$where)){
    header("location:../view/entry.php?status=success");
}else{
    header("location:../view/entry.php?status=error");
}