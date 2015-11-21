<?php
$exportitems = array(
         			 		   '0' => 'Participant',
							    '1' => 'Class Participation',
							    '2' => 'Action',
							     '3' => 'comment'
         			 );
$participants = array('p1','p2','p3','p4','p5');
echo "<pre>";

$exportitems = array($exportitems);
//echo "exportitems= "; print_r($exportitems);

$value1 = 1;
$value2 = 5;
$values = array();
//foreach ($participants as $participant) {
	$x = 5;
	if($x == 5){
		$grade_value = 10;

		$values = array_merge($values, array($grade_value));
	}
	$y = 4;
	if($y == 4){
		$grade_value2 = 20;

		$values = array_merge($values, array($grade_value2));
//	}
/*	$value1 += $value1;
	$value2 += $value2;
		$values = array_merge($values, array($value1, $value2));*/

//$exportitems = array_merge($exportitems, array($values));	
}
print_r($values);
echo "</pre>";
?>