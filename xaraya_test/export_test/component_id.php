<?php
$component_ids = array(
         			 		array('id' => 'plain',   'name' => 'Class participation'),
                            array('id' => 'compact', 'name' => 'Assignment1'),
                            array('id' => 'bygroup', 'name' => 'Final'),
                            array('id' => 'bytype',  'name' => 'Assignemnt2')
         			 );
echo "<pre>";
// print_r($component_ids);


//$exportitems = array('1'=> 'participant');
//$exportitems = array_merge($exportitems, $component_ids);
$exportitems = array('Participant');
//$i++;
foreach ($component_ids as $component_id) {
	$exportitems = array_merge($exportitems, array($component_id['name']));
	echo "<br>";
}
$exportitems = array_merge($exportitems,array('Total','Grade'));
//$exportitems = array_merge($exportitems,array('Grade'));
print_r($exportitems);
//echo "merge; ";
//print_r($exportitems);

if (!isset($show_headers)) array_shift($output);
echo "</pre>";
?>