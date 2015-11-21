<?php 
include_once('connection\dbConnection.php');  
	
function newUser()
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$userpassword = $_POST['userpassword'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	
	$date = new DateTime();
	$date->setDate($year, $month, $day);
	$birthday = date_format($date, 'Y-m-d');
//	echo "<br>birthday=".$birthday;
	$sex = $_POST['sex'];
	$privileges = $_POST['privileges'];
//	echo "<br>privileges="; print_r($privileges);
	$query = "INSERT INTO usertable 
		(firstname,lastname,username,email,userpassword,birthday,sex,privileges) VALUES ('$firstname','$lastname','$username','$email','$userpassword','$birthday','$sex','$privileges')";
		
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
		//checking the 'user' name is empty or have some text 
		if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) 
									 AND !empty($_POST['username']) AND !empty($_POST['userpassword']) 
									 AND !empty($_POST['email']) 
									 AND !empty($_POST['month']) AND !empty($_POST['day']) AND !empty($_POST['year'])
									 AND !empty($_POST['sex'] ) AND !empty($_POST['captcha_match'] )
									  )
		{ 
			$query = mysql_query("SELECT * FROM usertable WHERE username = '$_POST[username]'") or die(mysql_error());
			if ($_POST['captcha'] != $_POST['captcha_match'] ) {
				$captchaErr = '*';
				echo "<span id='error_message'>Captcha does not match!!</span>";
			} elseif (!$row = mysql_fetch_array($query)) {
				newUser();  
			} else { 
				echo "<span id='error_message'>Username exists!!</span>";
			}
		} 
		else { 
			echo "<span id='error_message'>Please fill all the entries!!</span>"; 
		}
	}
	
if(isset($_POST['submit'])) {
	SignUp(); 
//	echo "captch= "; print_r($_POST['captcha']);
//	echo "captcha_match= "; print_r($_POST['captcha_match']);
}
//code ended here
	include_once('signupForm.php');
?>
					

	</form>