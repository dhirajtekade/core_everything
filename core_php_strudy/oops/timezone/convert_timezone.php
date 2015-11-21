<?php

	echo "<br>syestem timezonw= ".$system_timezone;
   // date_default_timezone_set($system_timezone);
    
include('convert_timezone.class.php'); 
$target_datetime_object = new MyTimeZone($source_datetime,$source_timezone);
//$gmt_datetime_object = new MyTimeZone($source_datetime,$source_timezone);

$target_datetime = $target_datetime_object->convert($target_timezone,$system_timezone);
$gmt_datetime = $target_datetime_object->convert("GMT",$system_timezone);

?>