<?php

	$date = date_create();
	date_date_set($date, $year, $month, $day);
	$date->setTime($hours, $minutes,$seconds);


	$date = new DateTime($source_datetime, new DateTimeZone($_GET['system_timezone']));
	$source_datetime = $date->format('Y-m-d H:i:sP') . "\n";
	$target_timezone = $_POST['target_timezone'];
	include('convert_timezone.php'); 


								
?>