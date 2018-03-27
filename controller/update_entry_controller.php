<?php 
include_once '../model/index.php';
$where = array('id'=>$_POST['id']);

	if ($_POST['save']) {
	$data = array('date'=>$_POST['date'],'customer_id'=>$_POST['customer_id'],'vehicle_id'=>$_POST['vehicle_id'],'driver_id'=>$_POST['driver_id'],'starting_location'=>$_POST['starting_location'],'destination_location'=>$_POST['destination_location'],'starting_km'=>$_POST['starting_km'],'ending_km'=>$_POST['ending_km'],'total_km'=>$_POST['total_km'],'starting_time'=>$_POST['starting_time'],'ending_time'=>$_POST['ending_time'],'total_time'=>$_POST['total_time'],'type'=>$_POST['type'],'extra_amount'=>$_POST['extra_amount'],'bill_amount'=>$_POST['bill_amount'],'status'=>'1');

			if($wpdb->update('entry',$data,$where)){
				header("location:../view/entry.php?status=success");
			}else{
				header("location:../view/entry.php?status=error");
			}

	}elseif ($_POST['submit']) {
	 $data = array('date'=>$_POST['date'],'customer_id'=>$_POST['customer_id'],'vehicle_id'=>$_POST['vehicle_id'],'driver_id'=>$_POST['driver_id'],'starting_location'=>$_POST['starting_location'],'destination_location'=>$_POST['destination_location'],'starting_km'=>$_POST['starting_km'],'ending_km'=>$_POST['ending_km'],'total_km'=>$_POST['total_km'],'starting_time'=>$_POST['starting_time'],'ending_time'=>$_POST['ending_time'],'total_time'=>$_POST['total_time'],'type'=>$_POST['type'],'extra_amount'=>$_POST['extra_amount'],'bill_amount'=>$_POST['bill_amount'],'status'=>'0');
			if($wpdb->update('entry',$data,$where)){
				header("location:../view/view_entry.php?status=success");
			}else{
				header("location:../view/entry.php?status=error");
			}

	}else{
		header("location:../view/entry.php?status=error");
	}

 ?>
