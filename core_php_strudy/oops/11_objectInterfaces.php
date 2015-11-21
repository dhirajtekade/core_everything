<?php
/*About object interfaces
	1. inheritance class allows describing a parent-child relationship between classes.
	2. sometimes needs to add some additional interfaces to the class
	3. Interfaces is declared similar to a class but only includes functions prototypes(without implementation) and constant
	4. Any class that implements this interface automatically has the interface's constant defined 
* */
interface Book {
	public function getVariables();
	const FIRSTNAME = "firstbook";
	const SECONDNAME = "secondname";
}
class Template implements Book {
	public function getVariable() {
		echo Book::FIRSTNAME."<br>";
		echo Book::SECONDNAME;
	}
} 
$obj = new Template();
$obj->getVariable();


?>