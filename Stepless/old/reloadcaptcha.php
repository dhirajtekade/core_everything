
<html><head><script>
	function reloadcaptch(){
	
		xmlhttp.open("GET", "gethint.php?q="+str, true);
		xmlhttp.send();
	}
</script></head><body>

		<?php $string ='QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
							$string_shuf= str_shuffle($string);
							$three_string_shuf=substr($string_shuf,0, strlen($string)/12); ?>
					<input type="text" id ="captcha" name="captcha" size="6" value= 
								<?php echo $three_string_shuf;?>> 
								<span id="captcha"></span>
								
					<input type="button" name="captachbutton" value="Reload Captcha" onclick="reloadcaptch()"></button>
		
</body></html>
