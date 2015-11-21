<!DOCTYPE HTML>
<html>
<body>
<?php$username="username";$password="password";$database="username";
mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM books";$result=mysql_query($query);
$num=mysql_numrows($result);mysql_close();?>
<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td>
<font face="Arial, Helvetica, sans-serif">Book Id</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Book Name</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Author</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Price</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Availability</font>
</td>
</tr>

<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo "$row[no]"; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font>
</td>
</tr></table>
}
<?php$i++;}?>
</body>
</html>