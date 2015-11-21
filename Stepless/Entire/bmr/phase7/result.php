<?php
include('data.php');

$salutation = $_POST['salutation'];
$email= $_POST['email'];
$firstName = htmlspecialchars(stripslashes(trim(ucfirst($_POST['firstName']))));
$weight = calculateWeight($_POST['weight']);
$height = calculateHeight($_POST['height']);
$dweight = calculatedWeight($_POST['dweight']);
$gender = calculateGender($_POST['gender']);
$vegetarian = calculateVegetarian($_POST['foodPreference']);
$worktype = $_POST['worktype'];
if(!empty($_POST['height'])) {
	//$dob = strtotime($_POST['datetimepicker']);
	//$offset = calculateTimeOffset($_POST['datetimepicker'],$_POST['timezone']);
	$BMI = calculateBMI($weight, $height);
	//$age = floor((time() - $dob)/31536000); $_SESSION["age"] = $age;
	$age = $_POST['age'];
	//$dob = $dob - $offset;
	$RMR = calculateRMR($weight, $height, $age, $gender);
	$BMR = calculateBMR($RMR, $worktype);
	$BMIResult = calculateBMIResult($BMI);
}

$msg = "<div class=\"confirmdata\">".
	"<h3>Hi ".$salutation." ".$firstName.",</h3>".
	"<ul><li>Your weight is: ".$weight."</li>".
	"<li>Your desired weight is: ".$dweight."</li>".
	"<li>Your height is: ".$height."</li>".
	"<li>Vegetarian: ".$vegetarian."</li>".
	"<li>Your worktype is: ".$worktype."</li>".
	"<li>Your age is: ".$age."</li>".
	"<li>Your gender is: ".$gender."</li></ul>".
	"</div>";
echo $msg;
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($firstNameErr)&& empty($LastNameErr) && empty($weightErr) && empty($dweightErr) && empty($heightErr)) {
	echo "<div class=\"result\">";

	echo "<h2>Your report is here:</h2>You are burning <strong>".$RMR."</strong> calories; if you are resting all day.<br>";
	echo "But as your worktype is <strong>".$worktype."</strong>, you are now burning <strong>".$BMR."</strong> calories.<br>";
//	echo "And if you want to ".$gain." ".abs($weight_difference)." Kg, then you need to ".$add." <strong>".abs($NeededCalories)."</strong> calories in your daily diet.<br>";
	echo "Your BMI value: ".$BMI.". That means you are ".$BMIResult."<br>";
	echo "</div>";
	
	mail($email,"BMR Report",$msg);
/*	echo "<a href=\"http://www.wikihow.com/Gain-Weight\">Gain Weight</a><br>";
	echo "<a href=\"http://www.wikihow.com/Lose-Weight\">Lose Weight</a><br>";*/
}
?>