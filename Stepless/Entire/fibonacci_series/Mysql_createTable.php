<?php
/*$dbcon = @mysql_conenct(localhost, $username, $password); {
	if (!$dbcon) {
		echo ("Database Conenction Failed!");
		exit;
	}
	if (! @mysql_select_db ($database_name, $dbcon)) {
		echo ("Database Not Available!");
		exit;
	}
}*/
//create table
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "php-dt-ztest_php-20150228_dbstudy";
@mysql_connect($servername, $username, $password) or die("connection failed");
mysql_select_db($dbname) or die("could not select db");
echo "The MySQl Database Conenction Established!";
$query = "CREATE TABLE AuthorMaster(
			AuthorID INTEGER(3),
			AuthorName VARCHAR(25),
			AuthorDegree VARCHAR(25),
			Speciality VARCHAR(35),
			DOB VARCHAR(15))";
if (@mysql_query($query)) {
	echo ("<BR>TAble created successfully.");
}
else {
	echo ("<BR>Error creating table");
}
?>