<html><head></head>
<body>
	<!-- js lib which is useful to get timezone.name() -->
    <script src="script/jstz-1.0.4.min.js"></script> 
    <?php
/* if(empty($_POST['system_timezone'])){
 echo "<script> var timezone = jstz.determine();
    	var system_timezone = timezone.name();
	 	window.location.href = 'test.php?system_timezone=' + system_timezone;
    </script>";
 }
//	echo "<br>timezone variable =". $_GET['system_timezone'];
	
	$date = new DateTime('2015-05-15 13:21:27', new DateTimeZone($_GET['system_timezone']));
	$date->setTimezone(new DateTimeZone("Europe/Paris"));
	$target_datetime = $date->format('Y-m-d H:i:sP');
	echo "<br>our target_datetime=".$target_datetime;*/
  ?>
</body>
</html>