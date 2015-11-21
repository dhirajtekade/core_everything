<?php

include('commonfunctions.php');

/*echo "<br>source_datetime= ".$source_datetime;
echo "<br>target_timezone= ".$target_timezone;*/

$msg = "<div class=\"confirmdata\">".
	"<h3>Result,</h3>".
	"<ul><li><strong>Source Date Time with Time Zone : </strong>".$source_datetime."</li>".
	"<li><strong>GMT Date Time : </strong>".$gmt_datetime."</li>".
	"<li><strong>Target Date Time with Time Zone :</strong> ".$target_datetime."</li></ul>".
	"</div>";
echo $msg;
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($source_datetimeErr)) {
	echo "<div class=\"result\">";
	echo "form sent";
	echo "</div>";
	
}
?>