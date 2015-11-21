<?php
// define variables and set to empty values
$source_datetimeErr = "";
//$source_datetime = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["day"])) {
	    $source_datetimeErr = "Enter proper day";
	  } else {
	    $day = test_input($_POST["day"]);
	}
	if (empty($_POST["month"])) {
		$source_datetimeErr = "Enter proper month";
		} else {
		$month = test_input($_POST["month"]);
	}
	if (empty($_POST["year"])) {
	    $source_datetimeErr = "Enter proper year";
	  } else {
	    $year = test_input($_POST["year"]);
	}
	if (empty($_POST["hours"])) {
	    $source_datetimeErr = "Enter proper hours";
	  } else {
	    $hours = test_input($_POST["hours"]);
	}
	if (empty($_POST["minutes"])) {
	    $source_datetimeErr = "Enter proper minutes";
	  } else {
	    $minutes = test_input($_POST["minutes"]);
	}
	if (empty($_POST["second"])) {
	    $source_datetimeErr = "Enter proper seconds";
	  } else {
	    $second = test_input($_POST["second"]);
	}

}

	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	

?>