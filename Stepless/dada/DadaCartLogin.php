
<!DOCTYPE HTML>
<html>
<head>
<title>LoginPage</title>
<link rel= "stylesheet" type="text/css" href="DadaLogin.css">


</head>
<body bgcolor="BurlyWood">
<div id="main_div">

<!--web site name and admin login section in table --><br>
	<table id="header"><tr><td id="header_title">DadaCart 
	</td>
	<td>
		<table id="adminLogIn">
			<tr id="adminLoginText">
				<td>Admin</td>
				<td>Password</td>
				<td></td>
			</tr>
			<tr>
				<form method="POST" action="adminLogIn.php">
				<td><input type="text" name="adminname" id="adminIn"></td>
				<td><input type="password" name="adminpassword" id="adminIn"></td>
				<td><input id="button" type="submit" name="submit" value="Log In"/></td>
				</form>
			</tr>
		</table>
	
	</td></tr></table>
	
	
	<br>
<!--user sign in and user signup in table-->
<!-- we  deleted table of sign in and sign up tyo use 1)div 2)include and 3)css left right attribute-->
	<div id="userSignin">
		<fieldset style="width:30%"><legend id="legendSignin"> Sign In Here </legend>
		<form method="POST" action="userSignIn.php">
		User Name :<br><input type="text" name="username" size="40"  id="userIn" autofocus><br>
		Password :<br><input type="password" name="userpassword" size="40"  id="userIn" ><br>
		<input type="checkbox" name="saveme" value="saveme">Save Me</input>
		<br>
		<input id="button" type="submit" name="submit" value="Sign In "/>
		</form>
		</fieldset>
	</div>
	
	<div id= "userSignUp">
		<?php include 'dadaSignUp.php';?>
	</div>	

</div>
</body>
</html>