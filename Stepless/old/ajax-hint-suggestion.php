<html><head><script>
	function showHint(str){
		if(str.length==0){
			document.getElementById("txtHint").innerHTML="";
			return;
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "gethint.php?q="+str, true);
		xmlhttp.send();
	}
</script></head>
	<p>start typing input</p>
	<form>
		firstname:<input type="text" onkeyup="showHint(this.value)">
	</form>
	<p>Suggestions:<span id="txtHint"></span></p>
	
	<br><br>
	
		
</body></body></html>