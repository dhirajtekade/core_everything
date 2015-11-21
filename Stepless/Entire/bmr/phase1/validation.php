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