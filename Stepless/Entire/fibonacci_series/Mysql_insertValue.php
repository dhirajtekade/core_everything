<link rel="stylesheet" type="text/css" href="style.css">
<?php
//insert data into table
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "php-dt-ztest_php-20150228_dbstudy";
//$table = "AuthorMaster"
@mysql_connect($servername, $username, $password) or die("connection failed");
mysql_select_db($dbname) or die("could not select db");
echo "The MySQl Database Conenction Established!";
/*$query_createTable = "CREATE TABLE AuthorMaster(
			AuthorID INTEGER(3),
			AuthorName VARCHAR(25),
			AuthorDegree VARCHAR(25),
			Speciality VARCHAR(35),
			DOB VARCHAR(15))";*/
/*$query_insert = "INSERT INTO AuthorMaster (AuthorID, AuthorName, AuthorDegree, Speciality, DOB)
			VALUES (1, 'Ivan', 'M.Tech','Open Source Products', '23/06/1952')";*/
$query_select = "SELECT * FROM AuthorMaster";

$resultSet = mysql_query($query_select) or die("Execution of the SQL query failed");
$numrows = mysql_numrows($resultSet);
echo '<div class="table">';
$i = 0;
while($i < $numrows) {
	echo "<BR>";
	echo "AuthorID: ";
	echo mysql_result($resultSet, $i, 'AuthorID');
	echo "<BR>";
	echo "AuthorName: ";
	echo mysql_result($resultSet, $i, 'AuthorName');
	echo "<BR>";
	echo "AuthorDegree: ";
	echo mysql_result($resultSet, $i, 'AuthorDegree');
	echo "<BR>";
	echo "Speciality: ";
	echo mysql_result($resultSet, $i, 'Speciality');
	echo "<BR>";
	echo "DOB: ";
	echo mysql_result($resultSet, $i, 'DOB');
	++$i;
}
echo '</div>';
?>