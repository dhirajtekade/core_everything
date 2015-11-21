<?php include_once('connection\dbConnection.php'); 
 
 /* $ID = $_POST['user'];
 $Password = $_POST['pass'];
 */ 
 
 function SignIn() { 
 session_start();
 //starting the session for user profile page if(!empty($_POST['user'])) 
 //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
 
 {
 $query = mysql_query("SELECT * FROM admin where adminName = '$_POST[adminname]' AND adminPass = '$_POST[adminpassword]'") or die(mysql_error());
 $row = mysql_fetch_array($query) or die(mysql_error());
 if(!empty($row['adminName']) AND !empty($row['adminPass']))
 { 
 //$_SESSION['userName'] = $row['pass'];
 $_SESSION['adminName']=$row['adminName'];
 echo "Hi ";
 echo $_POST['adminName'];
 
//redirect the page to book.php
  header( 'Location: adminHome.php' ) ;
 } 
 else { 
 echo "wrong pass";
 } 
 }
 } 
 
 if(isset($_POST['submit']))
 { SignIn();
 } ?>

