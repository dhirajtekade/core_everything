<?php
// define variables and set to empty values
$firstNameErr = $lastNameErr =  $emailErr = $weightErr = $dweightErr = $heightErr = "";
$firstName = $lastName =  $email = $weight = $dweight = $height = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["firstName"])) {
	    $firstNameErr = "FirstName is required";
	  }
	if (empty($_POST["lastName"])) {
	    $lastNameErr = "LastName is required";
	  }
	/*if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
	  } else {
	    $email = test_input($_POST["email"]);
	}*/
	if (empty($_POST["weight"])) {
	    $weightErr = "Weight is required";
	  } 
	if (empty($_POST["dweight"])) {
	    $dweightErr = "Desired Weight is required";
	  }
	if (empty($_POST["height"])) {
	    $heightErr = "Height is required";
	  } 
	elseif (empty($firstNameErr)&& empty($LastNameErr) && empty($weightErr) && empty($dweightErr) && empty($heightErr)) {
		//include("result.php");
		include("data.php");
//need to try session to use the form value entered and send to the result.php
						
		echo "<script>var r = confirm(\"Confirm the Details \\n Name: $salutation $firstName $lastName \\n Weight $weight Kg, \\n Desired Weight: $dweight Kg, \\n Height: $height cm, \\n Age: $age years, \\n Worktype: $worktype, \\n Vegetarian: $vegetarian, \\n Gender: $gender \");
				if (r == true) {
				    x = window.location.assign(\"http://$host$uri/$extra\");
				} else {
				    x = \"You pressed Cancel!\";
				}</script>";
	}
}

	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	

?>