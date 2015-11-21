<?php
 
class MyClass
{
  public $prop1 = "I'm a class property!";
 
  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }
 
  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}
 
$obj = new MyClass;
echo $obj->prop1;
 $obj2 = new MyClass;
echo "<hr>";
$obj2->setProperty("overwrite class property from method");
echo $obj2->prop1;
?>