<?php 
//$members = "41,148,149,150,154,155,157,158,159,160,162,163,164,165,166,167,168,170,171,172,857,898";
$result = array (
				 '0' => array ( 'members' => '265,266,267'), 
				 '1' => array ( 'members' =>'' ),
				 '2' => array ( 'members' => '268,269,270' )
				 ) ;
				 
$id = '265';
foreach ($result as $res) {
	$res= explode(',' ,$res['members']);
//	echo "<br>result= "; print_r($res);
	if(in_array($id,$res)) {
		echo "<br>exits";
	} else echo "<br>not exists!";

}

echo "<pre>";
//echo "members_array= ";
//print_r($members);
/*
	if (in_array($value, $res)) {
		echo "exits";
	} else echo "does not exits";*/
	
/*if (in_array($value, $result)) {
	echo "exits";
} else echo "does not exits";*/

echo "</pre>";
?>