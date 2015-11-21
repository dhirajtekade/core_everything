<?
include_once('connection\dbConnection.php'); 

$sql="SELECT * FROM books";
echo "<br>sql= "; print_r($sql);
$result = mysql_query($sql);
echo "<br>result= "; print_r($result);

while ($row = mysql_fetch_assoc($result)) {
  echo $row['Field'] . ' ' . $row['Type'];
} 

$query = 'select * from books';

$result = mysql_query($query);

if (!$result) 
{
	$message = 'ERROR:' . mysql_error();
	return $message;
}
else
{
	$i = 0;
	echo '<div class=""><table><tr>';
	while ($i < mysql_num_fields($result))
	{
		$meta = mysql_fetch_field($result, $i);
		echo '<td>' . $meta->name . '</td>';
		$i = $i + 1;
	}
	echo '</tr>';
	
	$i = 0;
	while ($row = mysql_fetch_row($result)) 
	{
		echo '<tr>';
		$count = count($row);
		$y = 0;
		while ($y < $count)
		{
			$c_row = current($row);
			echo '<td>' . $c_row . '</td>';
			next($row);
			$y = $y + 1;
		}
		echo '</tr>';
		$i = $i + 1;
	}
	echo '</table>';
	mysql_free_result($result);
}


/*
while ($rows = mysql_fetch_assoc($result)) {
	echo "<br>"; print_r($rows);
}
*/
/*
$rows = mysql_fetch_assoc($result);
foreach ($rows as $row) {
	echo "<br>"; print_r($row);
}

echo "<br>row= "; print_r($rows);
*/
?>