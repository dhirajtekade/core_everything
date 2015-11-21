<?php
echo "rest";
$data = unserialize('a:3:{s:7:"display";a:3:{s:5:"group";s:1:"0";s:5:"level";s:3:"800";s:7:"failure";s:1:"1";}s:6:"modify";a:3:{s:5:"group";s:1:"0";s:5:"level";s:3:"800";s:7:"failure";s:1:"1";}s:6:"delete";a:3:{s:5:"group";s:1:"0";s:5:"level";s:3:"800";s:7:"failure";s:1:"1";}}');

 
print_r($data);
?>