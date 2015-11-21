<?php
//TODO getting some session warning need to check later or may be we could use cookies instead
session_start();
echo '<link href="style/bmr.css" rel="stylesheet">';
$salutation = $_SESSION["salutation"];
$firstName = $_SESSION["firstName"];
$lastName = $_SESSION["lastName"];
$weight = $_SESSION["weight"];
$dweight = $_SESSION["dweight"];
$height = $_SESSION["height"];
$age = $_SESSION["age"];
$email = $_SESSION["email"];
$worktype = $_SESSION["worktype"];
$gender = $_SESSION["gender"];
$vegetarian = $_SESSION["vegetarian"];
$RMR = $_SESSION["RMR"];
$BMR = $_SESSION["BMR"];
$gain = $_SESSION["gain"];
$add = $_SESSION["add"];
$NeededCalories = $_SESSION["NeededCalories"];
$weight_difference = $_SESSION["weight_difference"];

echo "<div class=\"resultBox\"><fieldset><div class=\"confirmDetails\">";
echo "confirm your details: <br><strong>Name:</strong> ".$firstName." ".$lastName."<br>
	<strong>Current Weight(in Kg):</strong> ".$weight."<br>
	<strong>Desired Weight(in Kg):</strong> ".$dweight."<br>
	<strong>Height(in Cm):</strong> ".$height."<br>
	<strong>Age:</strong> ".$age."<br>
	<strong>Worktype:</strong> ".$worktype."<br>
	<strong>Vegetarian:</strong> ".$vegetarian."<br>
	<strong>Gender:</strong> ".$gender."<br>";
echo "</div>";
echo "Your report is here:<br>You are burning <strong>".$RMR."</strong> calories; if you are resting all day.<br>";
echo "But as your worktype is ".$worktype." you are now burning <strong>".$BMR."</strong> calories.<br>";
echo "And if you want to ".$gain." ".abs($weight_difference)." Kg, then you need to ".$add." <strong>".abs($NeededCalories)."</strong> calories in your daily diet.<br>";
echo "</fieldset></div>";
echo "<a href=\"http://www.wikihow.com/Gain-Weight\">Gain Weight</a><br>";
echo "<a href=\"http://www.wikihow.com/Lose-Weight\">Lose Weight</a><br>";
//echo "back link";
//session_destroy(); 
?>