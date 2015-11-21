<?php define('DB_HOST', 'localhost');
 define('DB_NAME', 'dadacart');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 
 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
  
 
 function SignIn() { 
 session_start();
 //starting the session for user profile page if(!empty($_POST['user'])) 
 //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
 
 {
 $query = mysql_query("SELECT * FROM usertable where username = '$_POST[username]' AND userpassword = '$_POST[userpassword]'") or die(mysql_error());
 $row = mysql_fetch_array($query) or die(mysql_error());
 if(!empty($row['username']) AND !empty($row['userpassword']))
 { 
 
 $_SESSION['username']= $row['username'];
 $_SESSION['firstname']=$row['firstname'];
 $_SESSION['lastname']=$row['lastname'];
  $_SESSION['email']=$row['email'];
  //mail

//redirect the page to main site page
  header( 'Location: DadaCartHome.php' ) ;
 } 
 else { 
 echo "wrong pass";
 } 
 }
 } 
 
 if(isset($_POST['submit']))
 { SignIn();
 } ?>

