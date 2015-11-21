<?php
include('convert_timezone.class.php'); 
$target_datetime_object = new MyTimeZone($source_datetime,$source_timezone);
$gmt_datetime_object = new MyTimeZone($source_datetime,$source_timezone);

$target_datetime = $gmt_datetime_object->convert($target_timezone);
$gmt_datetime = $target_datetime_object->convert("GMT");

?>