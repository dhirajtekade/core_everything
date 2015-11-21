<?php session_start();?>
<!DOCTYPE html>
<head>
<link rel="icon" href="images/icons/title-login2.png" type="image/x-icon"/>
<title>Login</title>
	<link rel= "stylesheet" type="text/css" href="style/HomeStyle.css">
</head>
<body onload="captchareload()">
<div id="main_div">
	<?php include_once('header/header.php') ?>	
	
	<div id="main_section">
		<?php 
		if($_SESSION["login"] == "loggedin") {
			echo "<span id='loggenin_message'>You are already logged in!</span>";
		}else {
			include_once('SignIn.php');
		} ?>
	</div>
	<div id ="side_news">
		<?php 
		if($_SESSION["login"] == "loggedin") {?>
			<ul><li>Welcome.</li>
			<li>Have fun!</li>
			 <li>Do not forget to visit our store.</li>
		<?php }else {
			include_once('SignIn.php');
		 ?>
		<p>Login to acces the features.</p>
		<?php } ?>
	</div>
		

</div>	
	<?php include_once('footer/footer.php') ?>
</body>
</html>