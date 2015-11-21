<?php
/*Define varaibles*/

	function calculateWeight($weight) {
		$weight = abs($_POST['weight']);
		return $weight;
	}
	function calculateGender($gender) {
		$gender = $_POST['gender'];
		return $gender;
	}
	
	function calculatedWeight($dweight) {
		$dweight = abs($_POST['dweight']);
		return $dweight;
	}
	function calculateHeight($height) {
		$height = abs($_POST['height']);
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
	
	function ageCalculate($datetimepicker) {
		$dob = strtotime($datetimepicker);
		$offset = calculateTimeOffset($datetimepicker,$dobTZ);
		$dob = $dob - $offset;
		$age = floor((time() - $dob)/31536000); $_SESSION["age"] = $age;
		return $age;
	}
	function calculateBMI($weight, $height) {
		if($height ==0) {$height =1;}
		$BMI = ($weight*10000)/($height*$height);
		$BMI = round($BMI, 2);
		return $BMI;
	}
	function calculateBMIResult($BMI) {
		if ($BMI <= 18.5) { 
			$BMIResult = "Underweight. Need to gain weight<br><a href=\"http://www.wikihow.com/Gain-Weight\">Gain Weight</a><br>";
		} elseif ($BMI > 18.5 && $BMI <= 24.9) {
			$BMIResult = "of Normal weight";	
		} else if($BMI > 24.9 && $BMI <= 29.9) {
			$BMIResult = "Overweight. Should lose some weight<br><a href=\"http://www.wikihow.com/Lose-Weight\">Lose Weight</a><br>";	
		} elseif($BMI > 29.9) {
			$BMIResult = "Obesive. <br>Should care for your weight. Need to lose a lot of weight.<br><a href=\"http://www.wikihow.com/Lose-Weight\">Lose Weight</a><br>";	
		} 
		Return $BMIResult;
	}
?>