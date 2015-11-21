<html>
	<head>
		<title>
			Timezone
		</title>
	<link rel="stylesheet" media="all" type="text/css" href="stylecss/timezone.css">
	 	<script src="script/jstz-1.0.4.min.js"></script> 
	<div class="validation">
	 
			
	</head>
	<body>
	<?php
		include("validation.php");
	?>
	</div>
		<TABLE  CLASS="table" ALIGN="center" CELLSPACING="1" CELLPADDING="1" BGCOLOR="#FFFFFF" BORDER=0> 
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
				<TR><TD COLSPAN=2><p>Timezone Converter</p></TD></TR>
				<TR>
					<TD COLSPAN=2>Source Date:</TD>
					<TD>
					<input type="textbox" name="day" value="" placeholder="day" size="1">&nbsp;
					<input type="textbox" name="month" value="" placeholder="month" size="1">&nbsp;
					<input type="textbox" name="year" value="" placeholder="year" size="4">&nbsp;- &nbsp;
					<input type="textbox" name="hours" value="" placeholder="hrs" size="1">&nbsp;
					<input type="textbox" name="minutes" value="" placeholder="min" size="1">&nbsp;
					<input type="textbox" name="seconds" value="" placeholder="sec" size="1">&nbsp;<br><br>
					<?php
						/*$day = $_POST['day'];
						$month = $_POST['month'];
						$year = $_POST['year'];
						$hours = $_POST['hours'];
						$minutes = $_POST['minutes'];
						$seconds = $_POST['seconds'];
						
						$date = date_create();
						date_date_set($date, $year, $month, $day);
						$date->setTime($hours, $minutes,$seconds);
						$source_datetime = $date->format('Y-m-d H:i:s') . "\n";*/
					
					?>
						 
						<!-- 
						<input type="hidden" name="system_timezone" value="<?php 
						 echo "<script> var timezone = jstz.determine();
						    	var system_timezone = timezone.name();
							 	window.location.href = 'test.php?system_timezone=' + system_timezone;
						    </script>";
						  ?>">
						
						<span class="error"> <?php echo $source_datetimeErr;?></span><br>
						-->
					</TD>
				</TR>
				<TR>
					<TD COLSPAN=2>Target Timezone:</TD>
					<TD>
						<?php include('target_timezonedropdown.php'); ?>
					</TD>
				</TR>
				<TR><TD>
					<INPUT TYPE="Button" VALUE="SUBMIT" onClick="submit()" class="myButton"><br/>
					</TD>
				</TR>
			</FORM>
		</TABLE>
		<div class="resultBox">
			<?php
				include('result.php');
			?>
		</div>
	</body>
</html>
<?php

?>