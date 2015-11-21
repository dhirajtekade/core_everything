<?php

function usingStatic(){
 static $x=10;
echo $x."<br>";
$x++;
}
	function withoutStatic(){
	 $y=10;
	echo $y."<br>";
	$y++;
	}

usingStatic();
usingStatic();
usingStatic();
echo "without static keyword";
echo "<br>";
withoutStatic();
withoutStatic();
withoutStatic();
?>