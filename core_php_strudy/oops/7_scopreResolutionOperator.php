<?php
class Book {
	const NAME = "firstbook";	
}
//scope resolution operator(::) allows access to static, constabtand overridden members or methods of a class
	echo Book::NAME;
?>