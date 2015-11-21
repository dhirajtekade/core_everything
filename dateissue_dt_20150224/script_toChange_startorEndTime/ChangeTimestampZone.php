<?php
/*
foreach id in xar_publications table 
select number1 and number2 (assuming all are in GMT timestamp, so need to set 'Sitetimezone or America/log_angeles')
$number1 += + $this->calculateTimeOffset(); (or ) 
* 
* */
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "xar-dt-ztest_eventhub-20150225_test_eventsdateissue";
$table= "xar_publications";
@mysql_connect($servername, $username, $password) or die("connection failed");
mysql_select_db($dbname) or die("could not select db");

//Foreach id in xar_publications {
$query= "SELECT id,number1, number2 FROM ".$table;
$result= mysql_query($query) or die("sql query failed");

while($row= mysql_fetch_array($result)){
	$number1 = $row['number1'];
	$number2 = $row['number2'];
	$id =$row['id'];

	//$number1_corrected = $number1 + $this->calculateTimeOffset();
	//$number2_corrected = $number2 + $this->calculateTimeOffset();
	//UPDATE table_name SET field1=new-value1, field2=new-value2
	$query = "UPDATE ".$table." SET number1 = ".$number1_corrected.", number2 = ".$number2_corrected." WHERE id =".$id."<br>";
	//$query="INSERT INTO ".$table." (".$number1."," .$number2.") VALUES (".$number1_corrected.", ".$number2_corrected." )<br>";
	print_r($query);
	//$result= mysql_query($query) or die("sql query failed");
	//$row= mysql_fetch_array($result);
	
	
	/*if(!empty($number1)){
		$query="INSERT INTO ".$table." (number1, number2) VALUES (".$number1_corrected.", ".$number2_corrected." )";
		echo $query; 
	}
	elseif(!empty($number2)) {
		$query="INSERT INTO ".$table." (number1, number2) VALUES (".$number1_corrected.", ".$number2_corrected." )"
		
	}
	else {
		//echo 'no date is entered for this event';
	}*/
	
}

/*   public function calculateTimeOffset(){
 * 	// set timezone as $siteTZ = "america/los_angeles"
    	date_default_timezone_set('america/los_angeles');
		$siteTZ = date_default_timezone_get();
    	//$siteTZ = xarConfigVars::get(null, 'Site.Core.TimeZone');
    	echo $siteTZ;

		$dateTimeZoneGMT = new DateTimeZone("GMT");
		$dateTimeZoneSTZ = new DateTimeZone($siteTZ);
		
		$dateTimeGMT = new DateTime($number1, $dateTimeZoneGMT);
		$dateTime = new DateTime($number1, $dateTimeZoneSTZ);

		$timeOffset = $dateTimeZoneSTZ->getOffset($dateTimeGMT);

		return $timeOffset;
    }*/




?>