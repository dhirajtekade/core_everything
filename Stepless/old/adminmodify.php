<html>
<head>
<title>Admin Update</title>
<link rel= "stylesheet" type="text/css" href="styleup.css">
</head>
 <body id="body-color">  <div id="Sign-Up">

<?php
if(isset($_POST['update']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$bId = $_POST['bId'];
$bName = $_POST['bName'];
$bAuthor = $_POST['bAuthor'];
$bPrice = $_POST['bPrice'];
$bType = $_POST['bType'];
$bAvail = $_POST['bAvail'];

/*if elseif for- if one entry has to update, only that should get updated
but it lengthy to code for more than one entry to update
*/
mysql_select_db('dadacart');
			if(!empty($_POST['bName'])){
				$query = "UPDATE books SET bName = '$bName' 
					WHERE bId = '$bId'";
					$retval = mysql_query($query, $conn);
				}
			if(!empty($_POST['bAuthor'])){
				$query = "UPDATE books SET bAuthor = '$bAuthor' 
					WHERE bId = '$bId'";
					$retval = mysql_query($query, $conn);
				}	
			if(!empty($_POST['bName'])){
				$query = "UPDATE books SET bName = '$bName' 
					WHERE bId = '$bId'";
					$retval = mysql_query($query, $conn);
				}
			if(!empty($_POST['bPrice'])){
				$query = "UPDATE books SET bPrice = '$bPrice' 
					WHERE bId = '$bId'";
					$retval = mysql_query($query, $conn);
				}
			if(!empty($_POST['bType'])){
				$query = "UPDATE books SET bType = '$bType' 
					WHERE bId = '$bId'";
					$retval = mysql_query($query, $conn);
				}
			if(!empty($_POST['bAvail'])){
				$query = "UPDATE books SET bAvail = '$bAvail' 
					WHERE bId = '$bId'";
					$retval = mysql_query($query, $conn);
				}
	



//mysql_select_db('username');
//$retval = mysql_query($query, $conn);
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
echo "Updated data successfully\n";
header( 'Location: adminHome.php' ) ;
mysql_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">Book Id*</td>
<td><input name="bId" type="number" id="bId"></td>
</tr>
<tr>
<td width="100">New Book Name</td>
<td><input name="bName" type="text" id="bName"></td>
</tr>
<tr>
<td width="100">New Author Name</td>
<td><input name="bAuthor" type="text" id="bAuthor"></td>
</tr>
<tr>
<td width="100">New Price</td>
<td><input name="bPrice" type="text" id="bPrice"></td>
</tr>
<tr> <td>Genre</td><td width="100"> <select name="bType" value="bType" id="bType" >
				<option value="">Select the type of books:</option>
				<option value="technology">Technology</option>
				<option value="children">Children</option>
				<option value="literature">Literature</option>
				<option value="spiritual">Spiritual</option>
			</select></td></tr>
<tr>
<td width="100">Availability</td>
<td><input name="bAvail" type="text" id="bAvail"></td>
</tr>
<tr>
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="update" type="submit" id="update" value="Update">
</td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>