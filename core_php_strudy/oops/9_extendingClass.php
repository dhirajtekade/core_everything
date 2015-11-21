<?php
//base class
class Books {
	public $book;
	
	function getBook(){
		return $this->book;
	}
	function setBook($myBook) {
		$this->book = $myBook;
	}
}
//'PublishedBooks' class extends the class 'Books' using 'extends' keyword
class PublishedBooks extends Books {
	public $publisher;
	function getPublisher() {
		return $this->publisher;
	}
	function setPublisher($myPublisher) {
		$this->publisher = $myPublisher;
	}
}

$obj = new PublishedBooks();
$obj->setBook("firstbook");
$obj->setPublisher("publicationName");

echo "<strong>Book Name: </strong>".$obj->getBook()."<br>";
echo 'there is class PublishedBooks which is extending/inherting the class Book and using its properties and methods<br>';
echo "<strong>Publisher Name: </strong>".$obj->getPublisher()."<br>";
?>