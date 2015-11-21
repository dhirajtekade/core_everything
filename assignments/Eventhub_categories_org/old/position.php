
<?php
include 'dbconn.php';

$query= "SELECT * FROM celkotable";
$result= mysql_query($query) or die("sql query failed");
	echo '<form action="shownode.php" method="get">';
		echo '<table border=1><tr><td>Select</td><td><strong>id</strong></td><td><strong>Name</strong></td><td><strong>LeftID</strong></td><td><strong>RightID</strong></td><td><strong>Depth</strong></td></tr>';
		while($row= mysql_fetch_array($result))
			{
				echo '<tr>';
				echo '<td>';
				$id = $row['id'];
				//need to fix this
				echo "<input type='radio' name='id' value=$id>";
				echo '</td>';
								echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['left_id'].'</td>';
				echo '<td>'.$row['right_id'].'</td>';
				echo '<td>'.$row['depth'].'</td>';
				echo '</tr>';
			}
		echo '</tr></table><br><br>';
		
		echo '<input type="submit"><input type="reset">';
	echo '</form>';
?>	<!--<form action="shownode.php" method="get">
		Node ID: <input type="number" name="id"><br><br>
		<input type="radio" name="sex" value="male" checked>
		
		Left ID: <input type="number" name="LeftID"><br><br>
		Right ID: <input type="number" name="RightID"><br><br>
		
		<input type="submit"><input type="reset">
	</form>-->