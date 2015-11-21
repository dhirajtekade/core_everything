<link rel="stylesheet" type="text/css" href="style.css">
<?php
/* f = fn-1 + fn-2
 * 

* */
	echo 'Submit the form<br>';
	echo '<div class="form"><form action="'.$_SERVER['PHP_SELF'].'" method="get">';
	echo 'select range for fibonacci series<br>';
	echo '<input type ="number" value="total_number" name="total_number"> OR';
	echo '<input type="range" id="rangeInput" name="rangeInput" min="0" max="20" value="0" oninput="amount.value=rangeInput.value">';
	echo '<output name="amount" for="rangeInput">0</output><br><br>';
	echo '<input type="submit"><input type="reset">';
	echo '</form></div>';
	echo '<br><br>';
	
	if(isset($_GET['total_number'])) {
		$num = $_GET['total_number'];
		echo fibonacci($num,"yes");
	}elseif (isset($_GET['rangeInput'])) {
		
		$num = trim($_GET['rangeInput']); print_r($num);
		echo fibonacci($num,"yes");
	}
	
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
//echo (fibonacci(20, "yes"));
?>