<?php session_start();?>
<!DOCTYPE html>
<head>
<link rel="icon" href="images/icons/title-home2.png" type="image/x-icon"/>
<title>Home Page</title>
	<link rel= "stylesheet" type="text/css" href="style/BackEndStyle.css">
	<script src="selecttype.js" ></script>
  	<link href="css/elements.css" rel="stylesheet">
	<script src="js/my_js.js"></script>
	<script>
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
</script>
</head>
<body>
<div id="main_div">
	<?php include_once('header/admin.php') ?>	
	<?php include_once('product_header_admin.php') ?>
	<?php include_once('product_header_admin.php')?>
	<div id="show_table">
		<?php include_once('booksForm_admin.php') ?>
	</div>	
	<div id="show_form">	
		<?php include_once('addbooksForm_admin.php') ?>
	</div>

		
</div>	
	
</body>
</html>


