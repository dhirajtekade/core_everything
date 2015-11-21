	<div id="abc">
		<!-- Popup Div Starts Here -->
		<div id="popupContact">
			<!-- Contact Us Form -->
			<form action="#" id="form" method="post" name="form">
				<img id="close" height="30px" src="images/icons/red-close.png" onclick ="div_hide()">
				<h2>Add New Book</h2>
				<hr>
				<input id="name" name="name" placeholder="Name" type="text">
				<textarea id="desc" name="desc" placeholder="Description"></textarea>
				<input id="author" name="author" placeholder="Author" type="text">
				<input id="price" name="price" placeholder="Price" type="text">
				<input id="genre" name="genre" placeholder="Category" type="text">
				<input id="quantity" name="quantity" placeholder="Quantity" type="text">
				<a href="javascript:%20check_empty()" id="submit">Send</a>
			</form>
		</div>
		<!-- Popup Div Ends Here -->
	</div>
<?php
//echo "<img src='images/tumblr_ni8lp9BWpj1skswjlo1_500.gif'>"; //wwil show gif image may be in background
if($_SESSION["admin"] == "admin") {
	echo "<h3>Books at Store</h3>";
	include_once('connection\dbConnection.php'); 
	
$sql="SELECT * FROM books";
//echo "<br>sql= "; print_r($sql);
$result = mysql_query($sql);
//echo "<br>result= "; print_r($result);


echo "<br>";
$query = 'select books.Name,books.description, books.Author,books.Price, categories.category_name, books.Availability from books INNER JOIN categories ON books.Type = categories.id';

$result = mysql_query($query);

if (!$result) 
{
	$message = 'ERROR:' . mysql_error();
	return $message;
}
else
{
	echo "<center><table class='CSSTableGenerator'><tr>
					<td>Index</td>
					<td>Name</td>
					<td>Description</td>
					<td>Author</td>
					<td>Genre</td>
					<td>Price</td>
					<td>Availibility</td>
					<td>Action</td></tr>";
	echo "<tr>";
	$index =1;
	while($row = mysql_fetch_assoc($result)){
		echo "<td>".$index."</td>";
		echo "<td>".$row['Name']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "<td>".$row['Author']."</td>";
		echo "<td>".$row['category_name']."</td>";
		echo "<td>".floatval($row['Price'])."</td>";
		echo "<td>";if($row['Availibility']==1)
		{echo "Available";} else echo "Not available"; echo "</td>";
		echo "<td width='110'>"." Display "." Modify "." Delete "."</td>";
		$index++;
		echo "</tr>";
	}
	
	echo "</table>";
}
echo "<br>";
//echo "<div class='button_tag'><span class='button'>&lt;</span>";
echo '<button id="popup" onclick="div_show()">Add New Book (JS)</button>';
echo '<button id="button" onclick="show_addbookForm()">Add New Book</button>';
//echo '<span class="button" onclick="show_addbookForm()">Add New Book</span>';
//echo "<span class='button'>&gt;</span></div></center>";


	
}else {
	echo "Sorry! You do have access for this page!!";
}

 ?>