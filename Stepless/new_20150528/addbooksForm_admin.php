<?php
include_once('connection\dbConnection.php'); 
$query = "SELECT * FROM categories where product_id =1 ORDER BY category_name";
$result = mysql_query($query);
?>
<br>
<center>
<form action="addbooksFormAction_admin.php" id="form" method="post" name="form">
	<h2>Add New Book</h2>
	<hr>
	<input id="name" name="name" placeholder="Name" type="text">
	<textarea id="desc" name="desc" placeholder="Description"></textarea>
	<input id="author" name="author" placeholder="Author" type="text">
	<input id="price" name="price" placeholder="Price" type="text">
	<select name="genre">
		<option  value="">Select category</option>
	<?php while ($row = mysql_fetch_assoc($result)) {?>
		<option  value="<?php echo $row['id']?>"><?php echo $row['category_name']?></option>

	<?php }?>
	</select>
	<input id="quantity" name="quantity" placeholder="Quantity" type="text">
	<button type="submit" name="submit" id="submit">Add</a>
</form>
</center>