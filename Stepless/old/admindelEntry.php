
<?php define('DB_HOST', 'localhost');
 define('DB_NAME', 'dadacart');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
 
function delBook()
{
	$bName= $_POST['bName'];
	
	
	$query = "DELETE FROM books
WHERE bName='$bName'" ;

		
	$data = mysql_query ($query)or die(mysql_error());
	
	if($data) 
	{
	
	echo "one entry deleted successfully...";
	header( 'Location: adminHome.php' ) ;
	}
} 
function deleted()
	{ if(!empty($_POST['bName']))
	//checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
	{ 
		$query = mysql_query("SELECT * FROM books WHERE bName = '$_POST[bName]'") or die(mysql_error());
	if($row = mysql_fetch_array($query) or die(mysql_error()))
	{ delBook(); 
	} else { echo "SORRY... BOOK UNAVAILBLE ";
	} } } if(isset($_POST['submit']))
	{ deleted(); 
	}

?>