<?php
 
  mysql_connect("localhost","root","");
  mysql_select_db("dadacart");
 
  $username=$_POST["username"];
  $query=mysql_query("SELECT * from usertable where username='$username' ");
 
  $find=mysql_num_rows($query);
 
  echo $find;
 
?>