<?php
// define variables and set to empty values
$firstNameErr = $lastNameErr =  $emailErr = $weightErr = $dweightErr = $heightErr = $datetimepickerErr = "";
$firstName = $lastName =  $email = $weight = $dweight = $height = $datetimepicker = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["firstName"])) {
	    $firstNameErr = "FirstName is required";
	  } else {
	    $firstName = test_input($_POST["firstname"]);
	}
	if (empty($_POST["lastName"])) {
	    $lastNameErr = "LastName is required";
	  } else {
	    $lastName = test_input($_POST["lastname"]);
	}
	/*if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
	  } else {
	    $email = test_input($_POST["email"]);
	}*/
	if (empty($_POST["weight"])) {
	    $weightErr = "Weight is required";
	  } else {
	    $weight = test_input($_POST["weight"]);
	} 
	if (empty($_POST["dweight"])) {
	    $dweightErr = "Desired Weight is required";
	  } else {
	    $dweight = test_input($_POST["dweight"]);
	} 
	if (empty($_POST["height"]) && ($_POST["height"]) ==0) {
	    $heightErr = "Height is required";
	  } else {
	    $height = test_input($_POST["height"]);
	}
	if (empty($_POST["datetimepicker"])) {
	    $datetimepickerErr = "Date of Birth is required";
	  } else {
	    $datetimepicker = test_input($_POST["datetimepicker"]);
	}
	/* 
	else (empty($firstNameErr)&& empty($LastNameErr) && empty($weightErr) && empty($dweightErr) && empty($heightErr)) {
		echo "submitted";
		include('result.php');
	}
	*/
	
}
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	

?>