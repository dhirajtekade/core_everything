<?php $string ='QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
							$string_shuf= str_shuffle($string);
							$three_string_shuf=substr($string_shuf,0, strlen($string)/12); ?>
					<input type="text" id ="captcha" name="captcha" size="6" value= 
								<?php echo $three_string_shuf;?>> =
					<input type="text" id="captcha_match" name="captcha_match" size="10">
	<script>				
function check(){
if(captcha_match.value == captcha.value){
alert("true");}else alert("wrong");
}
function smail(){
<?php
//$subject= "confirmation mail";
	//	$message= "thanks for registration to Dadacart website";
		//$message= wordwrap($message,70);
		//mail("dhirajtekade@hotmail.com", $subject,$message,"From:dhirajtekade@gmail.com");
	?>	
	alert("check");
}
</script>
<button type="submit" value="chek"  onclick="check()">Cehck</button>
<button type="submit" value="chek"  onclick="smail()">mail</button>
			