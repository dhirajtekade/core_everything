<?php session_start();?>
<!DOCTYPE html>
<head>
<link rel="icon" href="images/icons/title-store.png" type="image/x-icon"/>
<title>Store House</title>
	<link rel= "stylesheet" type="text/css" href="style/HomeStyle.css">
	<script src="scripts/selecttype.js" ></script>
</head>
<body>
<div id="main_div">
	<?php include_once('header/header.php') ?>	
	
	<div id="main_section">
	
		 <?php  include_once('storeform.php');
		 ?> 

		
		
		
		
	</div>
	<div id ="side_news">
		<p>Select the books of your choice</p>
		<p>Select the dvds/ cds from various sections.</p>
	</div>
		

</div>	
	<?php include_once('footer/footer.php') ?>
</body>
</html>