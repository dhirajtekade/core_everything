<?php
$component_id = array(
         			 		   '0' => 'Participant',
							    '1' => 'Class Participation',
							    '2' => 'Action',
							     '3' => 'comment'
         			 );
         			 

         			 
$participants = array('p1','p2','p3','p4','p5');         			 
	
	$grade = 1;
	$grade_all = array();
	foreach ($component_id as $component_ids) {
		$grade += 1;
	//	echo "<br>grade= ".$grade;
		
		$grade_all = array_merge($grade_all, array($grade));
		
	}

//echo "<br>grade_all= "; print_r($grade_all[1]);

$exportitems = array($component_id);
echo "<pre>";
// print_r($exportitems);

$value1 = 1;
$value2 = 5;
$value3 = 10;
foreach ($participants as $participant) {
	$value1 += $value1;
	$value2 += $value2;
	$value3 += $value3; 
//	echo "<br>value1= ".$value1;
//	echo "<br>value2= ".$value2;
//	echo "<br>value3= ".$value3;
$exportitems = array_merge($exportitems, array(array($value1, $value2, $value3)));	
	
}
///echo "<br>";
//print_r($exportitems);
$participant_name = 'a:3:{i:0;a:2:{s:2:"id";s:10:"salutation";s:5:"value";s:3:"Mr.";}i:1;a:2:{s:2:"id";s:10:"first_name";s:5:"value";s:6:"Tobias";}i:2;a:2:{s:2:"id";s:9:"last_name";s:5:"value";s:4:"Aebi";}}';

 $name_array = unserialize($participant_name);
// print_r($name_array);
 foreach (unserialize($participant_name) as $name) {
//	print_r($name['value']); // exit;
 	$name1 .= " ".$name['value'];
 	
 //	echo $name['value'];
 }

 echo "<br>".$name1;
//echo $name;
echo "</pre>";
?>