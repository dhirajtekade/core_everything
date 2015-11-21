<?php
error_reporting(-1);

include_once("class/shape.php");
echo "<br/><br/>" . "**** circle ****";
$mySquare = new circle(6);
$mySquare->calc();
$mySquare->print_shape();

?>
