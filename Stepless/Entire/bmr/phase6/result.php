<?php
include('data.php');

$salutation = $_POST['salutation'];
$firstName = htmlspecialchars(stripslashes(trim(ucfirst($_POST['firstName']))));
$weight = calculateWeight($_POST['weight']);
$height = calculateHeight($_POST['height']);
$dweight = calculatedWeight($_POST['dweight']);
$gender = calculateGender($_POST['gender']);
$vegetarian = calculateVegetarian($_POST['foodPreference']);
$worktype = $_POST['worktype'];
if(!empty($_POST['datetimepicker']) && !empty($_POST['height'])) {
	$dob = strtotime($_POST['datetimepicker']);
	$offset = calculateTimeOffset($_POST['datetimepicker'],$_POST['timezone']);
	$BMI = calculateBMI($weight, $height);
	$age = floor((time() - $dob)/31536000); $_SESSION["age"] = $age;
	$dob = $dob - $offset;
	$RMR = calculateRMR($weight, $height, $age, $gender);
	$BMR = calculateBMR($RMR, $worktype);
	$BMIResult = calculateBMIResult($BMI);
}


	echo "<div class=\"confirmdata\">";
	echo "<h3>Hi ".$salutation." ".$firstName.",</h3>";
	echo "<ul><li>Your weight is: ".$weight."</li>";
	echo "<li>Your desired weight is: ".$dweight."</li>";
	echo "<li>Your height is: ".$height."</li>";
	echo "<li>Vegetarian: ".$vegetarian."</li>";
	echo "<li>Your worktype is: ".$worktype."</li>";
	echo "<li>Your age is: ".$age."</li>";
	echo "<li>Your gender is: ".$gender."</li></ul>";
	echo "</div>";
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($firstNameErr)&& empty($LastNameErr) && empty($weightErr) && empty($dweightErr) && empty($heightErr)) {
	echo "<div class=\"result\">";

	echo "<h2>Your report is here:</h2>You are burning <strong>".$RMR."</strong> calories; if you are resting all day.<br>";
	echo "But as your worktype is <strong>".$worktype."</strong>, you are now burning <strong>".$BMR."</strong> calories.<br>";
//	echo "And if you want to ".$gain." ".abs($weight_difference)." Kg, then you need to ".$add." <strong>".abs($NeededCalories)."</strong> calories in your daily diet.<br>";
	echo "Your BMI value: ".$BMI.". That means you are ".$BMIResult."<br>";
	echo "</div>";
/*	echo "<a href=\"http://www.wikihow.com/Gain-Weight\">Gain Weight</a><br>";
	echo "<a href=\"http://www.wikihow.com/Lose-Weight\">Lose Weight</a><br>";*/
}
?>