<?php
error_reporting(-1);
include_once("class/shape.php");

echo "<br/><br/>" . "**** Square ****";
$mySquare = new square1(6);
$mySquare->calc();
$mySquare->print_shape();

echo "<br/><br/>" . "**** Circle ****";
$myCircle = new circle(10);
$myCircle->calc();
$myCircle->print_shape();

echo "<br/><br/>" . "**** Polygon ****";
$myPolygon = new reg_polygon(6,7);
$myPolygon->calc();
$myPolygon->print_shape();
?>
