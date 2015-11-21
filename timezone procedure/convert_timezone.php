<?php
	$source_datetime = $_POST['datetime'];
	$target_timezone = $_POST['target_timezone'];
	echo $source_datetime;
	echo $target_timezone;
	
/* if source target is given
 * $date = new DateTime($source_datetime, new DateTimeZone('GMT'));
echo "<br>".$date->format('Y-m-d H:i') . "\n";

$date->setTimezone(new DateTimeZone($target_timezone));
echo "<br>".$date->format('Y-m-d H:i') . "\n";*/
 ?>