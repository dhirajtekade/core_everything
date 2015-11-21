<?php 
  session_start();
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Home Page</title>

<link rel= "stylesheet" type="text/css" href="bstyle.css"></head>
<body background="back.jpg">
<br<p style="color:red;text-align:center">DadaCart.com </p>
<br><br>
<?php include_once('connection\dbConnection.php');

 $sql="select * from books";
 $query=mysql_query($sql);

  
  echo "Hi Admin ";
  echo $_SESSION['user'];
 ?><center><table id="tab">
	<tr>
		
		<td>Id</td>
		<td>Book Name</td>
		<td>Author</td>
		<td>Price</td>
		<td>Availability</td>
	</tr></table></center>
<?php
 while($row = mysql_fetch_assoc($query)){?><center>
<table>
    <tr>
        
        <td><?php echo $row['bId']; ?></td>
        <td><?php echo $row['bName']; ?></td>
		<td><?php echo $row['bAuthor']; ?></td>
		<td><?php echo $row['bPrice']; ?></td>
		<td><?php if($row['bAvail']==1)
		{echo "yes";} else echo "not available"; ?></td>
    </tr>
</table></div>
 <?php } ?>
		 <form>
		 <button type="submit" value="add"  formaction="add.html">Add</button>
		 <button type="submit" value="modify"  formaction="modif.php">Modify</button>
		 <button type="submit" value="delete"  formaction="delete.html">Delete</button>
		 </form>
 </body></html>