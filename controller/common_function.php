<?php 
function get_vehicle_number($id,$wpdb){
	return $vehicles = $wpdb->get_results("SELECT * FROM vehicles WHERE id = $id",ARRAY_A)[0];
}



 ?>