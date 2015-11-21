<?php
echo "<hr>";
for ($ctr =1; $ctr <=5; $ctr++ ) {
	echo "The loop has been executed $ctr times(s)<br>";
}

echo "<hr>";
for ($i=1, $j=10; $i<5; $i++,$j+=5 ) {
	$k = $i +$j;
	echo "i: ".$i."<br> j:".$j."<br> k:".$k."<br><br>";
}
echo "<hr>";
$ctr1=1;
echo "The multiples of the number 25 upto 10 times are:<br>";
while ($ctr1 < 11) {
	echo "25 X $ctr1 =".($ctr1*25)."<br>";
	$ctr1++;
}
echo "<hr>";
$array = array('India'=>'New Delhi',
				'Pakistan'=>'Islamabad',
				'Sri Lanka'=>'Colomno',
				'Nepal'=>'Katmandu',
				'Kenya'=>'Nairobi');
echo "<table border=1>";
echo "<tr><th>Countries</th><th>Capitals</th></tr>";
reset($array);

while(list($key, $value) = each($array)) {
	echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";
echo "<hr>";
				
?>