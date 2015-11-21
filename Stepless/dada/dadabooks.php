<?php
$q=$_GET["q"];

$con = mysql_connect('localhost', 'root', 'root');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("php-dt-ztest_php-20150523_dadacart", $con);
	//if(".$q."== "all"){
	//$sql= "SELECT * FROM `books` WHERE bType= "literature" OR bType="spiritual" OR bType="children" OR bType="technology";
	//}else{
	$sql="SELECT * FROM books WHERE bType = '".$q."'";
	echo "sql= "; print_r($sql);
	//}

$result = mysql_query($sql);
 
echo "<table border='1'>
<tr>
<th>Book Id</th>
<th>Book Name</th>
<th>Author</th>
<th>Price</th>
<th>Genre</th>
<th>Availability</th>
</tr>";

while($row = mysql_fetch_assoc($result)){
//$row = mysql_fetch_assoc($result)
 echo "<tr>";
 echo "<td>" . $row['bId'] . "</td>";
 echo "<td>" . $row['bName'] . "</td>";
 echo "<td>" . $row['bAuthor'] . "</td>";
 echo "<td>" . $row['bPrice'] . "</td>";
 echo "<td>" . $row['bType'] . "</td>";
 echo "<td>" . $row['bAvail'] . "</td>";
 echo "</tr>";
 }
echo "</table>";

mysql_close($con);
?>