<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "php-dt-ztest_php-20150212_shownode";
$table= "xar_categories_org";
@mysql_connect($servername, $username, $password) or die("connection failed");
mysql_select_db($dbname) or die("could not select db");

?>