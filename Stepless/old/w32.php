<!DOCTYPE html>
<html></head></head><body>
<form method="post">
name:<input type="text" name ="fname"/><br>
<input type="text" name ="lname"/><br>
<input type="submit" onClick="myFun()" value ="submit"/><br>
<?php
function myFun(){

echo $_POST["fname"];

}
?>
</body></html>