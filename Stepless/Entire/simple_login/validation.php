<?php
	if($_POST['txtusername']=="") {
		echo "<FONT COLOR='RED'>Please enter the username</FONT>";
		echo "<HR>";
		include("login.php");
	}
	//ensures that value in username is in lower case
	elseif(!ctype_lower($_POST['txtusername'])) {
		echo "<FONT COLOR='RED'>Please enter the username in lower case</FONT>";
		echo "<HR>";
		include("login.php");
	}
	elseif($_POST['txtpassword']=="") {
		echo "<FONT COLOR='RED'>Please enter the password</FONT>";
		echo "<HR>";
		include("login.php");
	}
	//ensures that the atleast one number is included in password
	elseif(ctype_alpha($_POST['txtpassword'])) {
		echo "<FONT COLOR='RED'>Password should contain atleast one number</FONT>";
		echo "<HR>";
		include("login.php");
	}
	else {
		echo "<FONT COLOR='BLUE'>Congratualations! Login To Param Software Services Website is Successful!</FONT>";
		echo "<BR>";
		echo "<HR>";
		echo "Username:".$_POST['txtusername'];
		echo "<BR>";
		echo "Password:".$_POST['txtpassword'];
	}
?>