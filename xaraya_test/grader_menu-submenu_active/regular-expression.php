<?php 
$url = 'http://192.168.0.65:90/xd-dt/luetoff-caroll/devp/html/index.php?module=grader&type=user&func=view_participant_feedback';

$active = ereg('func*',$url);

echo "active = "; print_r($active);

?>