<?php
$date = new DateTime('2000-01-01 05:01:03', new DateTimeZone('Asia/Kolkata'));
echo $date->format('Y-m-d H:i:sP') . "\n";
 echo "<br>";
$date->setTimezone(new DateTimeZone('America/Los_Angeles'));
echo $date->format('Y-m-d H:i:sP') . "\n";
?>