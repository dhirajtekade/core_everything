<link rel="stylesheet" type="text/css" href="style/style.css">
<div class="form">
<form action="mypage.php" method="post">
	<table><tr><td>
	First Name: </td><td>
		<input type="text" name="fname" placeholder="<?php echo $firstname;?>"></td></tr><td>
	Last Name:</td><td>
		<input type="text" name="lname" placeholder="<?php echo $lastname;?>"></td></tr><td>
	DOB: </td><td>
		<input type="text" name="birthdate" placeholder="<?php echo $dob;?>"></td></tr>
	<td>	
	<INPUT TYPE="Button" VALUE="SUBMIT" onClick="submit()"></td></tr>
	</table>
	</form>
</div>
<?php 
?>