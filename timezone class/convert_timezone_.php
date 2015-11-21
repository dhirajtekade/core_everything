<?php
class MyTimeZone {
	/*
	var _source_datetime;
	var _source_timezone;
	var _target_datetime;
	var _target_timezone;
	*/
	public $source_datetime;
	public $source_timezone;// = $_POST['source_timezone'];
	public $target_datetime;
	public $target_timezone;

	function construct($source_datetime = "", $source_timezone = "GMT") {
	/*	
	_source_datetime = source_datetime
	_source_timezone = source_timezone
	*/
		$this->source_datetime = source_datetime;
		$this->source_timezone = source_timezone;
	}

	function Convert($target_timezone) {
	/*
	If target_timezone == ""
	 target_timezone = _target_timezone
	*/
		if(target_timezone == "") {
			$this->target_timezone = target_timezone;
		}
		echo "source time = ";$this->source_datetime; echo "<br>";//exit;
	// convert source_datetime from _source_timezone into _target_timezone and store in _target_datetime and return
	 

		return $target_timezone;
		//return $target_datetime;
	}
	
}
 //end of class

 



?>