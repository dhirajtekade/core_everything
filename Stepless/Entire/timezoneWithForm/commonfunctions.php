<?php
//include('va.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST['target_timezone'])) {
		// set source_timezone
		if (!empty($_POST['source_timezone'])) {
			$source_timezone = $_POST['source_timezone'];
		} else {
			$source_timezone = date_default_timezone_get();
		}
		// if date is passed from the form
		if (!empty($_POST['day']) && !empty($_POST['month']) && !empty($_POST['year'])) {
		
			$day = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			$hours = $_POST['hours'];
			$minutes = $_POST['minutes'];
			$seconds = $_POST['seconds'];
		//	$system_timezone = $_POST['system_timezone'];
			
			$date = new DateTime();
			$date->setDate($year, $month, $day);
			$source_datetime = date_format($date, 'Y-m-d');
			
			if (!empty($_POST['hours']) && !empty($_POST['minutes']) && !empty($_POST['seconds'])) {
				$date->setTime($hours, $minutes,$seconds);
				$source_datetime = $date->format('Y-m-d H:i:sP');
			}
//			$date = new DateTime($source_datetime, new DateTimeZone(date_default_timezone_get()));		
			$target_timezone = $_POST['target_timezone'];
			
		} else {
			$target_timezone = $_POST['target_timezone'];
		}
		include('convert_timezone.php'); 
	} else {
		echo "<div class='confirmdata'>Please enter target timezone atleast!</div>";
	}
} else {
	echo "<div class='confirmdata'>Welcome! You can convert the source datetime of particular timezone to equivalent datetime of targetted timezone. Try it!! </div>";
}


								
?>