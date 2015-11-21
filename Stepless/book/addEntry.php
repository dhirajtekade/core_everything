<?php 
include_once('connection\dbConnection.php');
	
function NewBook()
{
	$bName= $_POST['bName'];
	$bAuthor = $_POST['bAuthor'];
	$bPrice = $_POST['bPrice'];
	
	$query = "INSERT INTO books
		(bName,bAuthor,bPrice) VALUES ('$bName','$bAuthor','$bPrice')";
		
	$data = mysql_query ($query)or die(mysql_error());
	
	if($data) 
	{ //echo "one entry added successfully...";
	header( 'Location: books.php' ) ;
	}
} 
function added()
	{ if(!empty($_POST['bName']))
	//checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
	{ 
		$query = mysql_query("SELECT * FROM books WHERE bName = '$_POST[bName]' AND bAuthor = '$_POST[bAuthor]'") or die(mysql_error());
	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{ NewBook(); 
	} else { echo "SORRY... BOOK ALREADY IN THE DATABASE";
	} } } if(isset($_POST['submit']))
	{ added(); 
	}

 ?>
 <a href="Sign-In.html">access</a>

