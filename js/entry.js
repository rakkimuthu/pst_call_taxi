$(document).ready(function () {
	$(".calculate_value").on("change paste keyup", function() {
	 	var starting_km = $("input[name='starting_km']").val();
	 	var ending_km = $("input[name='ending_km']").val();
 	 	var total_km = parseFloat(ending_km)-parseFloat(starting_km);
 		$("#total_km").val(total_km);

	 	var starting_time = $("input[name='starting_time']").val();
	 	var ending_time = $("input[name='ending_time']").val();
 	 	var total_time = parseFloat(ending_time)-parseFloat(starting_time);
 		$("#total_time").val(total_time);
	});
});