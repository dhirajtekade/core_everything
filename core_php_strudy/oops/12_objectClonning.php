<?php
/*object clonning:
	Becuase $obj1 is an object handle so what is copied to $obj2 is then handle.
	So, when changing $obj2, it is actually changing the same object.
	
* */

class Number {
	public $num =10; 
	
}

//instanciate class
$obj1 = new Number();
$obj2 = $obj1;
$obj2->num =20;
print $obj1->num;
?>