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
		session_start();
		$_SESSION['firstname']=$_POST['firstname'];
		$_SESSION['lasttname']=$_POST['lastname'];
		$_SESSION['email']=$_POST['email'];
		

	}
} 
function SignUp()
	{ 
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
		} else {echo "*Please fill all the entries"; }
	}
	if(isset($_POST['submit']))
	{ SignUp(); 
	}
//code ended here
?>

					
						
<legend>Free Sign Up</legend>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
		
		<table>
			<tr>
				<td>
					<input type="text" name="firstname"  placeholder="First Name" id="userIn">
					<!-- <span class="error">*<?php echo $firstnameErr;?></span> -->
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="lastname"  placeholder="Last name" id="userIn">
					<!-- <span class="error">*<?php echo $lastnameErr;?></span> -->
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="text" name="username"  placeholder="username" id="userIn" maxlength="15">
					<!-- <span class="error">*<?php echo $usernameErr;?></span> -->
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="email" name="email"  placeholder="Email" id="userIn">
					<!-- <span class="error">*<?php echo $emailErr;?></span> -->
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="password" name="userpassword"  placeholder="New Password" id="userIn">
					<!-- <span class="error">*<?php echo $userpasswordErr;?></span> -->
				</td>
			</tr>
			
			<tr>
				<td>
					Birthday
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="date" name="birthday" id="userIn">
					<!-- <span class="error">*<?php echo $birthdayErr;?></span> -->
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="radio" name="sex" value="male">Male
				
					<input type="radio" name="sex" value="female">Female
				
					<!-- <span class="error">*<?php echo $sexErr;?></span> -->
				</td>
			</tr>
			<tr>
				<td>
					<?php $string ='QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
							$string_shuf= str_shuffle($string);
							$three_string_shuf=substr($string_shuf,0, strlen($string)/12); ?>
					<input type="text" id ="captcha" name="captcha" size="6" value= 
								<?php echo $three_string_shuf;?>> 
								<!--captcha  validation to be done
								=
					<input type="text" id="captcha_match" name="captcha_match" size="10"> -->
				
						<input type="button" value="cant see" onclick="captcha()"/>
					<script>
						function captcha(){if()}
					</script>
				</td>
			</tr>		
			<tr>
				<td>
					<input id="button" type="submit" name="submit" value="Sign Up "/>
					
				</td>
			</tr>
		</table>
	</form>