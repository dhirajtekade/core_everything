<!DOCTYPE html>
<head>
<link rel="icon" href="images/icons/title-home2.png" type="image/x-icon"/>
<title>DB Connection</title>
	<link rel= "stylesheet" type="text/css" href="style/BackEndStyle.css">
	<script src="selecttype.js" ></script>
</head>
<body>
	<legend>Establish DB connection</legend>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
	HostName: <input type="text" name="hostname" size="40"  id="hostname" autofocus><br>
	DB Name: <input type="text" name="dbname" size="40"  id="dbname" autofocus><br>
	UserName: <input type="text" name="username" size="40"  id="username" autofocus><br>
	Password:<input type="text" name="password" size="40"  id="password" autofocus><br>
	<br><br>
	<input id="button" type="submit" name="submit" value="Sign In "/>
	</form>
	
</body>
</html>
<?php 
	include_once 'establish_connection.php';
?>