<?php
/*About abstraction:
	1.creating an instance of a class that has been defined as abtsrct is not alowed
	2.Any class that contains at least one abstract method must also be allowed
	3.Methos defined as abstarct will just be declared and will not havethe methods signature .
		this means that the method is not implemented
	4.when inherting from an abstract class, the child must define all methods amarked abstarct in the parent class declaration
	
* */
//declaring AbstractBook as abstract
abstract class AbstractBook {
	//this abstact class have two methods 'getValue()' and 'prefixValue'
	abstract protected function getValue();
	abstract protected function prefixValue($prefix);
	public function printOut() {
		print $this->GetValue()."<br>";
	}
}

class FirstBook extends AbstractBook {
	//here child method is defined with same visibility
	protected function getValue() {
		return "First Book";
	}
	public function prefixValue($prefix) {
		return "{$prefix}";
	}
}

class SecondBook extends AbstractBook {
	//here child method is defined with weaker visibility
	public function getValue() {
		return "Second Book";
	}
	public function prefixValue($prefix) {
		return "{$prefix}";
	}
}
$class1 = new FirstBook;
$class1->printOut();
echo $class1->prefixValue('firstbook')."<br>";

$class2 = new SecondBook;
$class2->printOut();
echo $class2->prefixValue("secondBook")."<br>";
?>