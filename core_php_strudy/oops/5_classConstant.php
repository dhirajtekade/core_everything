<?php
class Book {
	const NAME = "firstconstantbookname";
	const AUTHOR1 = "secondconstantbookauthor";
	const AUTHOR2 = "thirdconstantbookauthor2";
	
	function PrintBook(){
		echo self::NAME."<br>";
		echo self::AUTHOR1."<br>";
	}
}
	$obj = new Book();
	$obj->PrintBook();
	echo Book::AUTHOR2;


?>