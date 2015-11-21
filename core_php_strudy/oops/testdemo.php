<?php
require_once('class.Demo.php');

$objDemo = new Demo();
$objDemo->setName('Steve');
/*
$objAnotherDemo =  new Demo();
$objAnotherDemo->name = "Ed";
*/
$objDemo->sayHello();

 ?>