<?php 
  session_start();
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Home</title>

<link rel= "stylesheet" type="text/css" href="bstyle.css"></head>
<body>
<br<h1><p style="color:red;text-align:center">DadaCart.com </p></h1>
<br><br>
<?php include_once('connection\dbConnection.php'); 

 $sql="select * from books";
 $query=mysql_query($sql);

  
  echo "Hi Admin ";
  
 ?><center><table id="tab">
	<tr>
		
		<td style="background-color:DarkCyan;font-size:12px">Id</td>
		<td style="background-color:DarkCyan;font-size:12px">Book Name</td>
		<td style="background-color:DarkCyan;font-size:12px">Author</td>
		<td style="background-color:DarkCyan;font-size:12px">Price</td>
		<td style="background-color:DarkCyan;font-size:12px">Genre</td>
		<td style="background-color:DarkCyan;font-size:12px">Availability</td>
	</tr></table></center>
<?php
 while($row = mysql_fetch_assoc($query)){?><center>
<table>
    <tr>
        
        <td><?php echo $row['bId']; ?></td>
        <td><?php echo $row['bName']; ?></td>
		<td><?php echo $row['bAuthor']; ?></td>
		<td><?php echo $row['bPrice']; ?></td>
		<td><?php echo $row['bType']; ?></td>
		<td><?php if($row['bAvail']==1)
		{echo "yes";} else echo "not available"; ?></td>
    </tr>
</table></div>
 <?php } ?>
		 <form>
		 <button type="submit" value="add"  formaction="adminadd.html">Add</button>
		 <button type="submit" value="modify"  formaction="adminmodify.php">Modify</button>
		 <button type="submit" value="delete"  formaction="admindelete.html">Delete</button>
		 </form>
		 
		 <br><br>
		 <p id="testbutton"><a href="DadaCartHome.php">Test</a></p>
		 <p id="testbutton"><a href="DadaCartLogin.html">Log Out</a></p>
 </body></html>