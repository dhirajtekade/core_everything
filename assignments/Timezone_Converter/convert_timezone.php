<?php

$source_datetime = $_GET['source_datetime'];
$target_timezone = test_input($_GET['target_timezone']);
$source_timezone = test_input($_GET['source_timezone']);
//Take query parameter value into proper variables 
$values =  GetParameterValue($source_datetime,$target_timezone,$source_timezone);

$source_datetime = $values['source_datetime'];
$source_timezone = $values['source_timezone'];
$target_timezone = $values['target_timezone'];

include('convert_timezone.cls'); 
//Create object of class
if (!empty($values['target_timezone'])) {

	$target_datetime_object = new MyTimeZone($source_datetime,$source_timezone);

	//Call convert method for target_timezone
	$target_datetime = $target_datetime_object->convert($target_timezone);
	//Call convert method for GMT
	$gmt_datetime = $target_datetime_object->convert("GMT");
	
	//Show output 
	 echo "<br><strong>a) Source Date Time with Time Zone : </strong>".$source_datetime." ".$source_timezone;
	 echo "<br><strong>b) GMT Date Time : </strong>".$gmt_datetime;
	 echo "<br><strong>c) Target Date Time with Time Zone : </strong>".$target_datetime;
} else {
	echo "<br>At least pass target_timezone!!";
}
 
function GetParameterValue ($source_datetime,$target_timezone,$source_timezone) {
	if (!empty($target_timezone)) {
		if (in_array($target_timezone, timezone_identifiers_list()) === true) {
			$values['target_timezone'] = $target_timezone;

		//getting source_datetime of desired source_timezone
			if (!empty($source_datetime)) {
				try {
				    $date = new DateTime($source_datetime);
				    $values['source_datetime'] = $date->format('Y-m-d H:i:s');
				} catch (Exception $e) {
				    echo $e->getMessage();
				    echo "<br>Bad datetime passed or something wrong with datetime format!";
				    exit(1);
				}		
			} else {
				// setting current time as source_datetime of desired source_timezone 
				$source_datetime = new DateTime(date("Y-m-d H:i:s",time()), new DateTimeZone(date_default_timezone_get()));
				
				if ($source_timezone == '') {
					$source_timezone = date_default_timezone_get();
					$values['source_timezone'] = $source_timezone;
				} elseif (in_array($source_timezone, timezone_identifiers_list()) === true) {
					$values['source_timezone'] = $source_timezone;
				} else {
					echo "<br> Bad source_timezone! default timezone is selected as source_timezone!!";
					$source_timezone = date_default_timezone_get();
					$values['source_timezone'] = $source_timezone;
				}			
				$source_datetime->setTimezone(new DateTimeZone($source_timezone));
				$values['source_datetime'] = $source_datetime->format('Y-m-d H:i:s');
			}
			
		} else { echo "<br>Bad target_timezone! Default timezone is selected for target_timezone!!";
				$target_timezone = date_default_timezone_get();
				$values['target_timezone'] = $target_timezone;
		} 

		if ($source_timezone == '') {
			$values['source_timezone'] = date_default_timezone_get();
		} else {
			$values['source_timezone'] = $source_timezone;
		}
		return $values;	
	} 
	else { 
		echo "<br>Insufficient data!" ;
	}
}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = preg_replace('/^(&quot;)(.*)(&quot;)$/', "$2", $data);
		$data = preg_replace('/^(&laquo;)(.*)(&raquo;)$/', "$2", $data);
		$data = preg_replace('/^(&#8220;)(.*)(&#8221;)$/', "$2", $data);
		$data = preg_replace('/^(&#39;)(.*)(&#39;)$/', "$2", $data);
		$data = html_entity_decode($data);
		return $data;
	}	
?>