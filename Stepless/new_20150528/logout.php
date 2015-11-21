<?php
session_start();
//$_SESSION['login'] = "notloggedin";
session_unset();
session_destroy(); 

header('Location: home.php');
?>