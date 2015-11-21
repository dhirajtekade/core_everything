<html>
<head>
<title></title>
</head>
<body>
<form action="convert_timezone.php" method="post" >
source date : <input type="datetime-local" name="datetime" value="<?php echo $_POST['datetime'] ?>">&nbsp;
<!--  source timezone : <?php include('source_timezonedropdown.php'); ?><br> -->
target timezone : <?php include('target_timezonedropdown.php'); ?><br>
<input type="submit">
</form>

</body>
</html>

<?php


?>