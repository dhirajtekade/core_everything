<?php
//include('va.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['day']) && !empty($_POST['month']) && !empty($_POST['year']) && !empty($_POST['minutes']) && !empty($_POST['seconds'])) {

	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$hours = $_POST['hours'];
	$minutes = $_POST['minutes'];
	$seconds = $_POST['seconds'];
	
	$date = date_create();
	date_date_set($date, $year, $month, $day);
	$date->setTime($hours, $minutes,$seconds);
	$source_datetime = $date->format('Y-m-d H:i:s') . "\n";
	echo  "<br>local timezone= ".date("T", $source_datetime);
	echo  "<br>timezone difference with UTC= ".date("Z", $source_datetime);
	$target_timezone = $_POST['target_timezone'];
	include('convert_timezone.php'); 
}
else {
	echo "Please enter the valid data!";
}
								
?>