<?php
 
class MyClass
{
  public $prop1 = "I'm a class property!";
 
  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }
 
  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }
 
  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}
 
// Create a new object
// construct is get called just after the creating the object
$obj = new MyClass;
 
// Get the value of $prop1
//get the class property
echo $obj->getProperty();
 
// Output a message at the end of the file
echo "End of file.<br />";
 
?>