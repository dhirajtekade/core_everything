<?php
class Display {
	public $name = "firstbook";
	public $price = 500;
	
	public function Calculate($discount){
		echo "The discount for the book ".$this->name." is Rs. ".$discount."<br>";
		$this->price -= $discount;
		echo "The price of book ". $this->name." after deducting discount is Rs. ".$this->price;
	}
}
$obj = new Display();
$obj->Calculate(100);

?>