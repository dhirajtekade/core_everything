<?php
$hostname = $_POST['hostname'];
$dbname = $_POST['dbname'];
$username = $_POST['username'];
$password = $_POST['password'];

//if(!empty($hostname) && !empty($dbname) && !empty($username)) {
	// check if connection can be establish. If yes then create db of the name $dbname
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	// Create database
	$sql = "CREATE DATABASE $dbname";
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully";
	/*	define('DB_HOST', $hostname);
		define('DB_NAME', $dbname);
		define('DB_USER',$username);
		define('DB_PASSWORD',$password);
		$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
		$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	   */  
	} else {
	    echo "Error creating database: " . $conn->error;
	}
//}
?>