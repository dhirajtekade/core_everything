<?php
echo "<pre>";
$data='a:6:{s:14:"display_layout";s:8:"vertical";s:15:"display_tooltip";s:0:"";s:20:"validation_notequals";s:0:"";s:17:"validation_equals";s:0:"";s:29:"initialization_basecategories";a:4:{i:0;a:8:{i:1;s:9:"New Tree1";i:2;s:9:"New Tree2";i:3;s:9:"New Tree3";i:4;s:9:"New Tree4";i:5;s:9:"New Tree5";i:6;s:9:"New Tree6";i:7;s:9:"New Tree7";i:8;s:9:"New Tree8";}i:1;a:8:{i:1;a:1:{i:1;a:1:{i:0;s:2:"19";}}i:2;a:1:{i:1;a:1:{i:0;s:2:"20";}}i:3;a:1:{i:1;a:1:{i:0;s:2:"26";}}i:4;a:1:{i:1;a:1:{i:0;s:2:"27";}}i:5;a:1:{i:1;a:1:{i:0;s:2:"65";}}i:6;a:1:{i:1;a:1:{i:0;s:2:"47";}}i:7;a:1:{i:1;a:1:{i:0;s:2:"34";}}i:8;a:1:{i:1;a:1:{i:0;s:2:"41";}}}i:2;a:8:{i:1;b:1;i:2;b:1;i:3;b:1;i:4;b:1;i:5;b:1;i:6;b:1;i:7;b:1;i:8;b:1;}i:3;a:8:{i:1;s:1:"1";i:2;s:1:"1";i:3;s:1:"1";i:4;s:1:"1";i:5;s:1:"1";i:6;s:1:"1";i:7;s:1:"1";i:8;s:1:"1";}}s:25:"initialization_other_rule";s:0:"";}';
$data = unserialize($data);
echo "<pre>";
print_r($data);
echo "</pre>";
?>