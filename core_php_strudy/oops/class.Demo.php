<?php
class Demo {
public $_name;

public function sayHello() {
	print "hello {$this->getname()}!";
	}
	
//implemnt property in form of function get[propert name]ans set [preopety name]
public function getName() {
	return $this->_name;
}
public function setName($name) {
	if(!is_string($name) || strlen($name)==0) {
		throw new Exception("Invalid name value");
	}
	
	$this->_name= $name;
}
}

 ?>