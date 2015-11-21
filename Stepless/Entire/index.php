<!DOCTYPE HTML>
<html>
<head>
<link rel="icon" href="images/icons/title-logo.jpg" type="image/x-icon"/>
<title>
LoginPage</title>
<link rel= "stylesheet" type="text/css" href="style/login.css">
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
					<?php include 'adminForm.php';?>
			</table>
		
		</td></tr></table>
		<br>
		<?php include 'signInForm.php';?>
		<div id= "userSignUp">
			<?php include 'dadaSignUp.php';?>
		</div>		
	</div>
</body>
</html>