<?php

	$source_datetime = $_POST['datetime'];
	echo "datetime = ";$source_datetime; exit;
//	public $source_timezone; = $_POST['source_timezone'];
//	public $target_datetime;
	$target_timezone = $_POST['target_timezone'];
include('convert_timezone_.php');
$obj = new MyTimeZone($source_datetime,$source_timezone);


echo  $obj->Convert($target_timezone);

 ?>