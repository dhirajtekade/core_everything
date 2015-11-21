<?php
// TODO need to write aray to have all values and use foreach for storing values in session
//session_start();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'result.php';
//header("Location: http://$host$uri/$extra");
/*Define varaibles*/
$salutation = $_POST['salutation']; $_SESSION["salutation"] = $salutation;
$firstName = ucfirst($_POST['firstName']); $_SESSION["firstName"] = $firstName;
$lastName = ucfirst($_POST['lastName']); $_SESSION["lastName"] = $lastName;
$weight = calculateWeight($weight); $_SESSION["weight"] = $weight;
$dweight = calculatedWeight($dweight); $_SESSION["dweight"] = $dweight;
$height = calculateHeight($height); $_SESSION["height"] = $height;
$email = $_POST['email']; $_SESSION["email"] = $email;
$worktype = $_POST['worktype']; $_SESSION["worktype"] = $worktype;
$gender = calculateGender($gender); $_SESSION["gender"] = $gender;
$vegetarian = calculateVegetarian($_POST['foodPreference']); $_SESSION["vegetarian"] = $vegetarian;

/*  TODO we will create ageCalculator function later
    $dob was correct in datetime, when converted in strtotime it shows GMT value; so need to convert again in birth place timezone
*/
$dob = strtotime($_POST['datetimepicker']);
//need to subtract current timezone- offset differnce
$offset = calculateTimeOffset($_POST['datetimepicker'],$_POST['timezone']);
//now timestamp value will be wrong but its timestamp will show the exact value which shpuld be in birth place timezone
$dob = $dob - $offset;
$age = floor((time() - $dob)/31536000); $_SESSION["age"] = $age;

//timestamp issue dob is for selected machine timezone and now will show GMT timezone.
//may be we need offset calculator function

$RMR = calculateRMR($weight, $height, $age, $gender); $_SESSION["RMR"] = $RMR;
$BMR = calculateBMR($RMR, $worktype); $_SESSION["BMR"] = $BMR;
$RMR_required = calculateRMR($dweight, $height, $age, $gender); $_SESSION["RMR_required"] = $RMR_required;
$BMR_required = calculateBMR($RMR_required, $worktype);  $_SESSION["BMR_required"] = $BMR_required;
$NeededCalories = $BMR_required  - $BMR; $_SESSION["NeededCalories"] = $NeededCalories;
$weight_difference = $dweight - $weight; $_SESSION["weight_difference"] = $weight_difference;

	if($NeededCalories > 0) {
		$gain = 'gain'; $_SESSION["gain"] = $gain;
		$add = 'add'; $_SESSION["add"] = $add;
	} else {
		$gain = 'lose'; $_SESSION["gain"] = $lose;
		$add = 'reduce'; $_SESSION["add"] = $reduce;
	}
	

	
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
	
?>