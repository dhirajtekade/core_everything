<?php
// define variables and set to empty values
$firstnameErr= $lastnameErr= $usernameErr= $emailErr= $userpasswordErr= $birthdayErr= $sexErr= "";
$firstname= $lastname= $username= $email= $userpassword= $birthday= $sex= "";

//empty_validation
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["firstname"])){
		$firstnameErr= "Type First Name Here";
	}else {	
		$firstname= test_input($_POST["firstname"]);	
	}
	if(empty($_POST["lastname"])){
		$lastnameErr= "Type your Last Name";		
	}else {	
		$lastname= test_input($_POST["lastname"]);
	}
	if(empty($_POST["username"])){
		$usernameErr= "Username is reuired ";		
	}else {	
		$username = test_input($_POST["username"]);
	}
	if(empty($_POST["email"])){
		$emailErr= "email is required";		
	}else {	
		$email = test_input($_POST["email"]);
	}
	if(empty($_POST["userpassword"])){
		$userpasswordErr= "Password is required";		
	}else {	
		$userpassword = test_input($_POST["userpassword"]);
	}
	if(empty($_POST["birthday"])){
		$birthdayErr= "Mention your Birthday";		
	}else {	
		$birthday = test_input($_POST["birthday"]);
	}
	if(empty($_POST["sex"])){
		$sexErr= "select your Gender";		
	}else {	
		$sex = test_input($_POST["sex"]);
	}
}
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	
	return $data;
}
?>