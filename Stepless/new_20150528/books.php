<?php
$q=$_GET["q"];

$con = mysql_connect('localhost', 'root', 'root');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }
 
mysql_select_db("php-dt-ztest_php-20150528_cart", $con);

	$query = "SELECT * FROM ".$q."";

$result = mysql_query($query);

if (!$result) 
{
	$message = 'ERROR:' . mysql_error();
	return $message;
}
else
{
	$i = 0;
	echo "<div class='CSSTableGenerator'>";
	echo '<table><tr>';
	while ($i < mysql_num_fields($result))
	{
		$meta = mysql_fetch_field($result, $i);
		echo '<td>' . $meta->name . '</td>';
		$i = $i + 1;
	}
	echo '<td>Checkbox</td></tr>';
	
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
	echo '</table></div>';
	mysql_free_result($result);
}

mysql_close($con);
?>