<?php
class Book {
	const NAME = "firstbook";	
}
	echo Book::NAME."<br><br>";
	class Author extends Book {
		public static $Author1= 'author1';
		public static $Author2= 'author2';
		
		public static function getNames(){
			/*parents refers to the parent class. used to call the parent constructor or method.
				parent should be useed as opposed to the parent's clas name because 
				it makes it easier to change the class hierarchy because the parent name is not hard coded*/
			echo "<strong>Book</strong>(using parent keyword): ".parent::NAME."<br>";
			//self refers to the parent class and it is usually used to access static members, methods and constabts
			echo "<strong>Author1</strong>(using self keyword): ".self::$Author1."<br>";
			echo "<strong>Author2</strong>(using self keyword): ".self::$Author2."<br>";
		}
	}
	Author::getNames();
?>