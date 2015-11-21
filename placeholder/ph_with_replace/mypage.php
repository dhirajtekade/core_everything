<?php
include ("mymsg.php");

$user_fname = $_POST["fname"];

$user_lname = $_POST["lname"];

$user_dob= $_POST["birthdate"];

$data = array($user_fname,$user_lname,$user_dob);

$output = showMyMsg($data);

echo $output



?>