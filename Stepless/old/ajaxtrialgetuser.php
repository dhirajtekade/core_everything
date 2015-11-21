<?php
define('DB_HOST', 'localhost');
 define('DB_NAME', 'dadacart');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 $conecDB=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	
//check we have username post var
if(isset($_POST["username"]))
{
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }   

        //try connect to db
    
    //trim and lowercase username
    $username =  strtolower(trim($_POST["username"])); 
    
    //sanitize username
    $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
    //check username in db
    $results = mysqli_query($connecDB,"SELECT adminName FROM admin WHERE adminName='$username'");
    
    //return total count
    $username_exist = mysqli_num_rows($results); //total records
    
    //if value is more than 0, username is not available
    if($username_exist) {
        echo "not avail";
    }else{
        echo 'availbale';
    }
    
    //close db connection
    mysqli_close($connecDB);
}
?>