<?php
$dob = strtotime($_POST['datetimepicker']);
echo "dob: ".$dob;
$now = time();
echo "now: ".$now;
//timestamp issue dob is for selected machine timezone and now will show GMT timezone.
//may be we need offset calculator function
$RMR = calculateRMR($_POST['weight'], $_POST['height'], $_POST['age'], $_POST['gender']);
$BMR = calculateBMR($RMR, $_POST['worktype']);
$RMR_required = calculateRMR($_POST['dweight'], $_POST['height'], $_POST['age'], $_POST['gender']);
$BMR_required = calculateBMR($RMR_required, $_POST['worktype']);
$NeededCalories = $BMR_required  - $BMR;
$dweight = $_POST['dweight'] - $_POST['weight'];
if($NeededCalories > 0) {
	$gain = 'gain';
	$add = 'add';
} else {
	$gain = 'lose';
	$add = 'reduce';
}
echo "Your details are here:<br>You are burning <strong>".$RMR."</strong> calories; if you are resting all day.<br>";
echo "But as your worktype is ".$_POST['worktype']." you are now burning <strong>".$BMR."</strong> calories.<br>";
echo "And if you want to ".$gain." ".abs($dweight)." Kg, then you need to ".$add." <strong>".abs($NeededCalories)."</strong> calories.<br>";



?>