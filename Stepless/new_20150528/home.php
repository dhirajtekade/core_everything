<?php session_start();?>
<!DOCTYPE html>
<head>
<link rel="icon" href="images/icons/title-home2.png" type="image/x-icon"/>
<title>Home Page</title>
	<link rel= "stylesheet" type="text/css" href="style/HomeStyle.css">
	<script src="scripts/selecttype.js" ></script>
	<script src="js/jquery-1.11.2.min.js"></script>

	<script src="http://code.jquery.com/jquery-1.7.2.min.js" ></script>

</head>
<body>
<div id="main_div">
	<?php include_once('header/header.php') ?>	
	<?php include_once('news/news.php') ?>
	<?php include_once('css/socialmediaicons.php') ?>	
</div>	
	<?php include_once('footer/footer.php') ?>
</body>
</html>