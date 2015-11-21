<?php
include_once('connection\dbConnection.php');
	
function NewUser()
{
	$fullname = $_POST['name'];
	$userName = $_POST['user'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$query = "INSERT INTO websiteusers 
		(fullname,userName,email,pass) VALUES ('$fullname','$userName','$email','$password')";
		
	$data = mysql_query ($query)or die(mysql_error());
	
	if($data) 
	{ echo "YOUR REGISTRATION IS COMPLETED...";
	}
} 
function SignUp()
	{ if(!empty($_POST['user']))
	//checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
	{ 
		$query = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{ newuser(); 
	} else { echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	} } } if(isset($_POST['submit']))
	{ SignUp(); 
	}

 ?>
 <a href="Sign-In.html">access</a>

