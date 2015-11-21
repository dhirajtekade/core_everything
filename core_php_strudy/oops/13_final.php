<?php
/*
	sometimes we may need to make sure that a method canot be re-implemented in its derived classes
	We use 'final' access for methods
* */
class BaseClass {
	public function Test() {
		echo "BaseClass::Test() called<br>";
	}
	final public function MoreTest() {
		echo "BaseClass::MoreTest() called<br>";
	}
	
}

// this script wont work becauseit is trying to overridde a final method

class ChildClass extends BaseClass {
	public function Moretest() {
		echo "ChildClass::Moretest() called<br>";
	}
}

//similarlly we can define final class. that will disallows inheriting from class
?>