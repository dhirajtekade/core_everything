<?php session_start();?>
<!DOCTYPE html>
<head>
<link rel="icon" href="images/icons/title-register.png" type="image/x-icon"/>
<title>Register Form</title>
	<link rel= "stylesheet" type="text/css" href="style/HomeStyle.css">
</head>
<body onload="captchareload()">
<div id="main_div">
	<?php include_once('header/header.php') ?>	
	
	<div id="main_section">
		<?php include_once('signup.php') ?>
	</div>
	<div id ="side_news">
		<p>Please Fill up all the details in the form.</p>
		<p>Registered users can access many other features of the site.</p>
	</div>
		

</div>	
	<?php include_once('footer/footer.php') ?>
</body>
</html>