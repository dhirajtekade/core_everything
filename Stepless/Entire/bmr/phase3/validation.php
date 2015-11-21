<?php
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
	//offset calculator function for age
	
    function calculateTimeOffset($time)
    {
    	//$siteTZ = selected time zone;

    	// Create two timezone objects, one for GMT and one for Site Time Zone
		$dateTimeZoneGMT = new DateTimeZone("GMT");
		$dateTimeZoneSiteTZ = new DateTimeZone($siteTZ);
		
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