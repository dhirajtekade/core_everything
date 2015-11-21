<?php
class Display {
	publlic $productname = "MySQL 5 For Professionals";
	public $price = 500;
	
	public function calculate($discount) {
		echo "The percent discount for the product ".$this->productname." is Rs. ".$discount."<br>";
		
		$this->price = $this->price - ($this->price *($discount/100));
		echo "The price of the product after discount is Rs ".$this->price. "<br>"
	}
}

$obj = new Display();
$obj->calculate(10);

?>