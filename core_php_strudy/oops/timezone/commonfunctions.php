<?php
//include('va.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['day']) && !empty($_POST['month']) && !empty($_POST['year']) && !empty($_POST['minutes']) && !empty($_POST['seconds'])) {

	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$hours = $_POST['hours'];
	$minutes = $_POST['minutes'];
	$seconds = $_POST['seconds'];
//	$system_timezone = $_POST['system_timezone'];
	
	$date = date_create();
	date_date_set($date, $year, $month, $day);
	$date->setTime($hours, $minutes,$seconds);

	if(empty($_GET['system_timezone'])){

	 }
//	$system_timezone = "Asia/Kolkata";
	$date = new DateTime($source_datetime, new DateTimeZone($_GET['system_timezone']));
	$source_datetime = $date->format('Y-m-d H:i:sP') . "\n";
	$target_timezone = $_POST['target_timezone'];
	include('convert_timezone.php'); 
}
else {
	echo "Please enter the valid data!";
	
}
								
?>