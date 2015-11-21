<?php
class MyTimeZone {

	public $source_datetime;
	public $source_timezone;
	public $target_datetime;
	public $target_timezone;

	public function __construct($source_datetime = "", $source_timezone = "GMT") {

		$this->source_datetime = $source_datetime;
		$this->source_timezone = $source_timezone;
	}

	public function convert($target_timezone) {

		if($target_timezone == "") {
			$this->target_timezone = $target_timezone;
		}

		$system_timezone = date_default_timezone_get();
		echo "<br>system timezone= ".$system_timezone;
		$date = new DateTime($this->source_datetime, new DateTimeZone($system_timezone));
		echo "<br>source time= ".$date->format('Y-m-d H:i:sP') . "\n";

		$date->setTimezone(new DateTimeZone($target_timezone));
		$target_datetime = $date->format('Y-m-d H:i:sP');

		return $target_datetime;
	}
	
}
 //end of class

$source_datetime = date("1980-03-12 08:55:45");
//echo "source_datetime= ".$source_datetime ;
$source_timezone= "Asia/Kolkata";
$target_timezone= "America/Los_Angeles";

$obj = new MyTimeZone($source_datetime,$source_timezone);
$obj2 = new MyTimeZone($source_datetime,$source_timezone);
echo "<br>target datetime= ".$obj->convert($target_timezone);
echo "<br>target datetime= ".$obj2->convert("GMT");
 



?>