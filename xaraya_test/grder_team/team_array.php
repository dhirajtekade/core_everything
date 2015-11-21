<?php

 $fieldnames=  array
(
    '0' => 'id',
    '1' => 'member',
    '2' => 'grade_entries',
    '3' => 'grade_entries_done',
    '4' => 'grade_total',
    '5' => 'grade_total_adjusted',
    '6' => 'public_comment',
    '7' => 'state'
);
echo "<pre>";
print_r($column);

//$column= array_merge($column , array('Team'));

//print_r($column);

//$a = array('a'=>1,'z'=>2,'d'=>4);

//$splitIndex = array_search('2', array_keys($fieldnames));
//print_r($splitIndex);
$fieldnames = array_merge(
        array_slice($fieldnames, 0, 2), 
        array('2' => 'team'), 
        array_slice($fieldnames, 2)
);

print_r($fieldnames);
echo "</pre>";
?>