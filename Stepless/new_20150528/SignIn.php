<?php 

include_once('connection\dbConnection.php'); 

 function SignIn() { 
 	if(!empty($_POST['username']) AND !empty($_POST['userpassword'])) {
 		$query = mysql_query("SELECT * FROM usertable where username = '$_POST[username]' AND userpassword = '$_POST[userpassword]'") or die(mysql_error());
 		$row = mysql_fetch_array($query);
 	//	print_r($row);
 		if(!empty($row)) {
 			$_SESSION["login"] = "loggedin";
 			if($row['privileges'] == 1) {
 				$_SESSION["admin"] = "admin";	
 			}
	 		echo "<span id='success_message'>Logged in successfully!</span>";
			//header ("Location: page1.php");
		} else {
			
			echo "<span id='error_message'>Username or password is incorrect!</span>";
		}
 	} else {
 		
 		echo "<span id='error_message'>Please fill the username and/or password!</span>";
 	}
 }
 	
 if(isset($_POST['submit'])) { 
 	SignIn();
 } 
 if($_SESSION["login"] == "loggedin") {
 	echo "";
 } else {
 	include_once 'signinForm.php';
 }
 ?>

