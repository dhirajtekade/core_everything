<?php
include_once('connection\dbConnection.php'); 
/*  1) check data validity 
	2) insert the entries in books table
	3) show alert box to display 'successfully added!'
	4) redirect page back to show books table i.e. books_product_admin.php 
*/
if(isset($_POST['submit']) && $_POST['name'] !='' ) {
	new_book();
} else echo "Please insert book name atleast and submit to add new entry!";
 
function new_book() {
	$bookname = $_POST['name'];
	$description = $_POST['desc'];
	$author = $_POST['author'];
	$price = $_POST['price'];
	$genre = $_POST['genre'];
	$quantity = $_POST['quantity'];

	$query = "INSERT INTO books (Name,description,Author,Price,Type,Availability) VALUES
		 ('$bookname','$description','$author','$price','$genre','$quantity')";
		
	$data = mysql_query ($query)or die(mysql_error());
	
	if($data) { 
		//echo "<script>alert('Book added successfully!!)</script>";
		header('Location: books_product_admin.php'); 
		echo "<script>alert('Book added successfully!!)</script>";
	}
}

?>
