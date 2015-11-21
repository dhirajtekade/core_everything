<?php
function showMyMsg($data)
{
	$content = file_get_contents("template/mymsg.tpl");
	$placeholder = array("|_{FIRST_NAME}_|", "|_{LAST_NAME}_|", "|_{DOB}_|");
	$output = preg_replace($placeholder, $data, $content);
	return $output;
}



?>