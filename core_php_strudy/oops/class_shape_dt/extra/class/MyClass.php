<?php
class MyClass {
	public $everyoneData;
	private $myData;
	protected $myCounter;
	
	public function setData($data) {
		$this->myData =$data;
	}
	public function getData() {
		return $this->myData;
	}
}
class Book {
	
	private $name;
	//constructor can also accept arguments, which will change default value held in class properties
	function __construct($name) {
		$this->name = $name;
	}
	/*function __destruct() {
		$this->name = NULL;
		print "destructor used to destroy the properties of the class.<br>";
	}*/
	function getName() {
		return $this->name;
	}
}
class Books {
const name ="<hr>Using PHP 5.1 For Professionals";
	const author1 = "Rasmus Lerdorf";
	const author2 = "DT";
	function printBooks() {
		echo self::name."<br>";
		echo self::author1."<br>";
	}
}
?>