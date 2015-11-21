<html>
<head>

<script>
	$(#username).keyup(function(e){
		var username=$(this).val();
		$post('ajaxtrialgetuser.php', {'username':username}, function(data){
		$("#user-result").html(data);
		});
	});
</script>
</head>
<body>


<input type="text" name="username" id="username"/>


<br>
<div id="user-result"><b>here</b></div>

</body>
</html>