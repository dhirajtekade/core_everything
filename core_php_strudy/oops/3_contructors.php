<?php
class Book{
	private $name;
	function __construct($name){
		$this->name = $name;
	}
	function getName(){
		return $this->name;
	}
}
$firstBook = new Book("firstBook");
$secondBook = new Book("second book"); 

print $firstBook->getName()."<br>";
print $secondBook->getName()."<br>";
?>