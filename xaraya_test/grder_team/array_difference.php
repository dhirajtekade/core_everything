<?php
$value1 = '265,267,268,269';
$value2 = '265,266,267,268,269,270';


$members1 = explode(',' ,$value1);
$members2 = explode(',' ,$value2);
//echo "<br>members1 = "; print_r($members1);
//echo "<br>members2 = "; print_r($members2);
$pid_array = array_diff($members2, $members1);
$pid_common = array_intersect($members1, $members2);

print_r($result);
echo "<br>array_diff = "; print_r($pid_array);
echo "<br>array_common = "; print_r($pid_common);
$result = array (
				 '0' => array ( 'members' => '265,267,268,269'), 
				 '1' => array ( 'members' =>'' ),
				 '2' => array ( 'members' => '268,269,270' )
				 ) ;

$itemid =2;
// check and remove participant-id from each members if members = $itemid
/*
foreach ($result as $res ) {
	//echo "<br>res= "; print_r($res);
}
*/
				 
?>