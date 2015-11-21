<html>
<head>
<title></title>
</head>
<body>
	<form action="convert_timezone.php" method="post" >
		source date : <input type="textbox" name="date" value="<?php echo $_POST['date'] ?>" placeholder="mm/dd/yyyy">&nbsp;<br>
					<input type="textbox" name="day" value="" placeholder="day" size="3">&nbsp;
					<input type="textbox" name="month" value="" placeholder="month" size="3">&nbsp;
					<input type="textbox" name="year" value="" placeholder="year" size="4">&nbsp;- &nbsp;
					<input type="textbox" name="hours" value="" placeholder="hrs" size="3">&nbsp;
					<input type="textbox" name="minutes" value="" placeholder="min" size="3">&nbsp;
					<input type="textbox" name="seconds" value="" placeholder="sec" size="3">&nbsp;<br><br>
		<!--  source timezone : <?php include('source_timezonedropdown.php'); ?><br> -->
		target timezone : <?php include('target_timezonedropdown.php'); ?><br><br>
		<input type="submit">
	</form>

</body>
</html>
