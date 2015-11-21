<?php 
include_once('connection\dbConnection.php');
 
 /* $ID = $_POST['user'];
 $Password = $_POST['pass'];
 */ 
 
 function SignIn() { 
 session_start();
 //starting the session for user profile page if(!empty($_POST['user'])) 
 //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
 
 {
 $query = mysql_query("SELECT * FROM websiteusers where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
 $row = mysql_fetch_array($query) or die(mysql_error());
 if(!empty($row['userName']) AND !empty($row['pass']))
 { 
 $_SESSION['userName'] = $row['pass'];
 //echo "Hi ";
// echo $_POST['user'];
//	$_SESSION['usernam']= '$_POST[user]';
//	echo $_POST['usernam'];
  header( 'Location: books.php' ) ;
 } 
 else { 
 echo "wrong pass";
 } 
 }
 } 
 
 if(isset($_POST['submit']))
 { SignIn();
 } ?>

