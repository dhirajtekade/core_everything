<?php

//code copied from usersignup for insert record into database OR just include it
define('DB_HOST', 'localhost');
define('DB_NAME', 'php-dt-ztest_php-20150523_book');
define('DB_USER','root');
define('DB_PASSWORD','root');
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


?>