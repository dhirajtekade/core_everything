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

	public function convert($target_timezone = "") {
		if($target_timezone == "") {
			$this->target_timezone = $target_timezone;
		}

	// convert source_datetime from _source_timezone into _target_timezone and store in _target_datetime and return
		$date = new DateTime($this->source_datetime, new DateTimeZone($this->source_timezone));
		$date->setTimezone(new DateTimeZone($target_timezone));
		$target_datetime = $date->format('Y-m-d H:i:s e');

		return $target_datetime;
	}
	
}


?>