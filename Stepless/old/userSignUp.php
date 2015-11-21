<?php define('DB_HOST', 'localhost');
 define('DB_NAME', 'dadacart');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	
function NewUser()
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$userpassword = $_POST['userpassword'];
	$birthday = $_POST['birthday'];
	$sex = $_POST['sex'];
	$query = "INSERT INTO usertable 
		(firstname,lastname,username,email,userpassword,birthday,sex) VALUES ('$firstname','$lastname','$username','$email','$userpassword','$birthday','$sex')";
		
	$data = mysql_query ($query)or die(mysql_error());
	
	if($data) 
	{ echo "Thanks for registration!!";
		//echo "now you can Sign In";
		header( 'Location: DadaCartLogin.php' ) ;
	}
} 
function SignUp()
	{ 
		// define variables and set to empty values
$firstnameErr= $lastnameErr= $usernameErr= $emailErr= $userpasswordErr= $birthdayErr= $sexErr= "";
$firstname= $lastname= $username= $email= $userpassword= $birthday= $sex= "";
$Valid = true;
//empty_validation
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["firstname"])){
		$firstnameErr= "Type First Name Here";
		$Valid = false;
	}else {	
		$firstname= test_input($_POST["firstname"]);
	}
	if(empty($_POST["lastname"])){
		$lastnameErr= "Type your Last Name";
		$Valid = false;
	}else {	
		$lastname= test_input($_POST["lastname"]);
	}
	if(empty($_POST["username"])){
		$usernameErr= "Username is reuired ";
		$Valid = false;
	}else {	
		$username = test_input($_POST["username"]);
	}
	if(empty($_POST["email"])){
		$emailErr= "email is required";
		$Valid = false;
	}else {	
		$email = test_input($_POST["email"]);
	}
	if(empty($_POST["userpassword"])){
		$userpasswordErr= "Password is required";
		$Valid = false;
	}else {	
		$userpassword = test_input($_POST["userpassword"]);
	}
	if(empty($_POST["birthday"])){
		$birthdayErr= "Mention your Birthday";
		$Valid = false;
	}else {	
		$birthday = test_input($_POST["birthday"]);
	}
	if(empty($_POST["sex"])){
		$sexErr= "select your Gender";
		$Valid = false;
	}else {	
		$sex = test_input($_POST["sex"]);
	}
}
		//if(!empty($_POST['username']) AND !empty($_POST['firstname']))
		if($Valid)
		//checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
		{ 
			$query = mysql_query("SELECT * FROM usertable WHERE username = '$_POST[username]' AND userpassword = '$_POST[userpassword]'") or die(mysql_error());
			if(!$row = mysql_fetch_array($query) or die(mysql_error()))
			{
				newuser(); 
			} else { 
					echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
				   }
		} 
	//}
	if(isset($_POST['submit']))
	{ SignUp(); 
	}

 ?>
 <a href="DadaCartLogin.php">Sign In</a>

