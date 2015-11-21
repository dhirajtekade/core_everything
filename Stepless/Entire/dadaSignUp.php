<?php 

//code copied from usersignup for insert record into database OR just include it
include_once('connection\dbConnection.php');  
	
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
	{ echo "Thanks for registration!! ";
		//echo "now you can Sign In";
		//sending mail
		//$subject= "confirmation mail";
		//$message= "thanks for registration to Dadacart website";
		//$message= wordwrap($message,70);
		//mail("$_POST['email']", $subject,$message,"From:dhirajtekade@gmail.com");
	/*
	  session_start();
		$_SESSION['firstname']=$_POST['firstname'];
		$_SESSION['lasttname']=$_POST['lastname'];
		$_SESSION['email']=$_POST['email'];
	*/
	}
} 
function SignUp() { 
	//validation starts
		//checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
		if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) 
									 AND !empty($_POST['username']) AND !empty($_POST['email']) 
									 AND !empty($_POST['userpassword']) AND !empty($_POST['birthday']) 
									 AND !empty($_POST['sex']) 
									  )
		{ 
			$query = mysql_query("SELECT * FROM usertable WHERE username = '$_POST[username]' AND userpassword = '$_POST[userpassword]'") or die(mysql_error());
			if(!$row = mysql_fetch_array($query) or die(mysql_error()))
			{
				newuser(); 
			} else { 
				echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
			}
		} else {
			echo "*Please fill all the entries"; }
	}
	if(isset($_POST['submit'])) {
		SignUp(); 
	}
//code ended here
	include_once('userSignUpForm.php');
?>
					

	</form>