<script>
	function showHint(str){
		document.getElementById("txtHint").innerHTML="";
		return;
	}
	 var xmlhttp=new XMLHttpRequest();
	  xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
	
 }
  xmlhttp.open("GET","getcaptchahint.php?q="+str,true);
  xmlhttp.send();
}	
</script>
<?php
session_start();
$code=rand(1000,9999);
$_SESSION["code"]=$code;
$im = imagecreatetruecolor(50, 24);
$bg = imagecolorallocate($im, 22, 86, 165); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?> =
<input type="text" onkeyup="showHint(this.value)">
<p><span id="txtHint"></span></p>