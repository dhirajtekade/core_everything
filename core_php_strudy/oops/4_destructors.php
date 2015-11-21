<?php
class Book{
	private $name;
	function __construct($name){
		$this->name = $name;
	}
	function __destruct(){
		$this->name = NULL;
		print "desructor used to destroy the properties of the class.<br>";
	}
	function getName(){
		
		return $this->name;
	}
}
$firstBook = new Book("firstBook");
$secondBook = new Book("second book"); 

print $firstBook->getName()."<br>";
$firstBook = NULL; //even without these lines destructor would be called but at the end of execution
print $secondBook->getName()."<br>";
$secondBook = NULL;
?>