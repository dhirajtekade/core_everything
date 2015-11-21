<?php
/* f = fn-1 + fn-2
 * 

* */

	
function fibonacci ($num, $showseries ="no") {
	$retval = "";
	if ($num == 1) { return 1;}

	$num1 = 1;
	$num2 = 0;
	$retval = "1";

for ($i=1; $i< $num; $i++) {
	$num3 = $num1 + $num2;
	$num2 = $num1;
	$num1 = $num3;
	
	if ($showseries == 'yes') { $retval.=",".$num3; }
	}
	if ($showseries == 'yes') { return $retval; }
	else { return $num3; }
}
  echo 'Fibonacci series.<br>'.(fibonacci(20, "yes"));
?>