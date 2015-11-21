<?php
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
echo "confirm your details: <br><strong>Name:</strong> ".ucfirst($_POST['fistName'])." ".ucfirst($_POST['lastName'])."<br>
	<strong>Current Weight(in Kg):</strong> ".$weight."<br>
	<strong>Desired Weight(in Kg):</strong> ".$dweight."<br>
	<strong>Height(in Cm):</strong> ".$height."<br>
	<strong>Age:</strong> ".$age."<br>
	<strong>Worktype:</strong> ".$worktype."<br>
	<strong>Vegetarian:</strong> ".$vegetarian."<br>
	<strong>Gender:</strong> ".$gender."<br>";
	
echo "Your report is here:<br>You are burning <strong>".$RMR."</strong> calories; if you are resting all day.<br>";
echo "But as your worktype is ".$worktype." you are now burning <strong>".$BMR."</strong> calories.<br>";
echo "And if you want to ".$gain." ".abs($weight_difference)." Kg, then you need to ".$add." <strong>".abs($NeededCalories)."</strong> calories.<br>";



?>