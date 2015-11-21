
<?php 
include_once('connection\dbConnection.php');
 
function delBook()
{
	$bName= $_POST['bName'];
	
	
	$query = "DELETE FROM books
WHERE bName='$bName'" ;

		
	$data = mysql_query ($query)or die(mysql_error());
	
	if($data) 
	{
	
	echo "one entry deleted successfully...";
	header( 'Location: books.php' ) ;
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