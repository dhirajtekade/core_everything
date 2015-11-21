<?php

include ("mymsg.php");
$user_fname = $_POST["fname"];

$user_lname = $_POST["lname"];

$user_dob= $_POST["birthdate"];

$data = array(

			"firstname" => $user_fname,
			
			"lastname" => $user_lname,
			
			"dob" => $user_dob

		);

showMyMsg($data);




?>