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
		//$system_timezone = "Asia/Kolkata";
		echo "<br>system timezone= ".$system_timezone;
		$date = new DateTime($this->source_datetime, new DateTimeZone($system_timezone));
	//	echo "<br>source time= ".$date->format('Y-m-d H:i:sP') . "\n";

		$date->setTimezone(new DateTimeZone($target_timezone));
		$target_datetime = $date->format('Y-m-d H:i:sP');

		return $target_datetime;
	}
	
}


 



?>