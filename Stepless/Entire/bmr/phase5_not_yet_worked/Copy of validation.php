<?php
// define variables and set to empty values
$firstNameErr = $lastNameErr =  $emailErr = $weightErr = $dweightErr = $heightErr = "";
$firstName = $lastName =  $email = $weight = $dweight = $height = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["firstName"])) {
			    $firstNameErr = "FirstName is required";
			  } else {
			    $firstName = test_input($_POST["firstName"]);
			}
			if (empty($_POST["lastName"])) {
			    $lastNameErr = "LastName is required";
			  } else {
			    $lastName = test_input($_POST["lastName"]);
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
			if (empty($_POST["height"])) {
			    $heightErr = "Height is required";
			  } else {
			    $height = test_input($_POST["height"]);
			}
			if(empty($firstNameErr)) {
				/*$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = 'result.php';
				header("Location: http://$host$uri/$extra");*/
				include("result.php");
			}
		}
		
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
	
/*Define varaibles*/
$weight = calculateWeight($weight);
$dweight = calculatedWeight($dweight);
$height = calculateHeight($height);
$worktype = $_POST['worktype'];
$gender = calculateGender($gender);
$vegetarian = calculateVegetarian($_POST['foodPreference']);

/*  we will create ageCalculator function later
    $dob was correct in datetime, when converted in strtotime it shows GMT value; so need to convert again in birth place timezone
*/
$dob = strtotime($_POST['datetimepicker']);
//need to subtract current timezone- offset differnce
$offset = calculateTimeOffset($_POST['datetimepicker'],$_POST['timezone']);
//now timestamp value will be wrong but its timestamp will show the exact value which shpuld be in birth place timezone
$dob = $dob - $offset;
$age = floor((time() - $dob)/31536000);
//timestamp issue dob is for selected machine timezone and now will show GMT timezone.
//may be we need offset calculator function

$RMR = calculateRMR($weight, $height, $age, $gender);
$BMR = calculateBMR($RMR, $worktype);
$RMR_required = calculateRMR($dweight, $height, $age, $gender);
$BMR_required = calculateBMR($RMR_required, $worktype);
$NeededCalories = $BMR_required  - $BMR;
$weight_difference = $dweight - $weight;

if($NeededCalories > 0) {
	$gain = 'gain';
	$add = 'add';
} else {
	$gain = 'lose';
	$add = 'reduce';
}	
		
		
		
if($_POST['fistName']=="") {
	echo "<FONT COLOR='RED'>Please Enter First Name<FONT>";
	echo "<HR>";
	include("userform.php");
}
elseif($_POST['lastName']=="") {
	echo "<FONT COLOR='RED'>Please Enter Last Name<FONT>";
	echo "<HR>";
	include("userform.php");
}
else {
	echo "<FONT COLOR='BROWN'>Data Entered Successfully</FONT><HR>";
	echo "Hi ".$_POST['salutation']." ".ucfirst($_POST['fistName']).",<BR />";
	
	function calculateWeight($weight) {
		$weight = $_POST['weight'];
		return $weight;
	}
	function calculateGender($gender) {
		$gender = $_POST['gender'];
		return $gender;
	}
	
	function calculatedWeight($dweight) {
		$dweight = $_POST['dweight'];
		return $dweight;
	}
	function calculateHeight($height) {
		$height = $_POST['height'];
		return $height;
	}
		
	function calculateVegetarian($foodPreference) {
		if($foodPreference =='Non-vegetarian') {
			$vegetaraian = 'no';
		}
		else {
			$vegetaraian = 'yes';
		}
		return $vegetaraian;
	}
    function calculateTimeOffset($time,$dobTZ)
    {
    	//$dobTZ = selected time zone;

    	// Create two timezone objects, one for GMT and one for Site Time Zone
		$dateTimeZoneGMT = new DateTimeZone("GMT");
		$dateTimeZoneSiteTZ = new DateTimeZone($dobTZ);
		
		// Create two DateTime objects that will contain the same Unix timestamp, but
		// have different timezones attached to them.
		$dateTimeGMT = new DateTime($time, $dateTimeZoneGMT);
		$dateTime = new DateTime($time, $dateTimeZoneSiteTZ);
		
		// Calculate the GMT offset for the date/time contained in the $dateTimeZoneGMT
		// object, but using the timezone rules as defined for Site Time Zone
		$timeOffset = $dateTimeZoneSiteTZ->getOffset($dateTimeGMT);

		// Should calculate the timezone differnce with GMT (for dates after Sat Sep 8 01:00:00 1951 JST).
		return $timeOffset;
    }
	function calculateRMR($weight, $height,$age,$gender) {
		if ($gender == 'Male') { $x=5;}else {$x= -161;}
		$RMR = (10*$weight) + (6.25*$height) - (5*$age) + $x;
		return $RMR;
	}
	function calculateBMR($RMR, $worktype) {
		switch ($worktype) {
	    case 'Sedentary':
	        $wtype=1.2;
	        break;
	    case 'Lightly Active':
	        $wtype=1.375;
	        break;
	    case 'Moderately Active':
	        $wtype=1.55;
	        break;
	    case 'Very Active':
	        $wtype=1.75;
	        break;
		} 
		$BMR = $RMR * $wtype;
		return $BMR;
	}
	include("result.php");
}

?>