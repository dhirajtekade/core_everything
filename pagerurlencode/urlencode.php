<?php

$url1 = 'com?startnum=%%&id=9&order=name';
$url2 = 'com?id=9&startnum=%%&order=name';
$url3 = 'com?id=9&order=name&startnum=%%';

echo strpos($url1, 'startnum');

?>