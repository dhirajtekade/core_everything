<?php define('DB_HOST', 'localhost');
 define('DB_NAME', 'dadacart');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	
function NewBook()
{
	$bName= $_POST['bName'];
	$bAuthor = $_POST['bAuthor'];
	$bPrice = $_POST['bPrice'];
	$bGenre = $_POST['bType'];
	$bAvail = $_POST['bAvail'];
	
	$query = "INSERT INTO books
		(bName,bAuthor,bPrice,bType,bAvail) VALUES ('$bName','$bAuthor','$bPrice','$bGenre','$bAvail')";
		
	$data = mysql_query ($query)or die(mysql_error());
	
	if($data) 
	{ echo "one entry added successfully...";
	header( 'Location: adminHome.php' ) ;
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

