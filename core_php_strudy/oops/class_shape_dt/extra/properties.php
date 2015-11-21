<?php

//created object
	include_once("class/MyClass.php");
	$clsObject = new MyClass();
	//calling method of the class for the object created
	//uisng private variable of the class in its object  
	$clsObject->setData("Hello! Dhiraj<br>");
	print $clsObject->getData();
	
	$firstBook = new Book("MySQL 5 For Professionals");
	$secondBook = new Book("Using  PHP 5.1 For Professionals<br>");
	
	print $firstBook->getName()."<br>";
	//$firstBook = NULL;
	print $secondBook->getName();
	//$secondBook = NULL;

	$obj =new Books();
	$obj->printBooks();
	echo Books::author2;
?>