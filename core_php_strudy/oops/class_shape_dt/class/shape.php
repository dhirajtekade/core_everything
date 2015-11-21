<?php

class shape {
	var $x;
	var $y;
	var $area = 0;
	var $perimeter = 0;
	var $comment;
	function __construct($x1 = 0, $y1 = 0) {
		$this->comment = " ";
		$this->x = $x1;
		$this->y = $y1;
	}	
	function calc() {
		$this->calc_area();
		$this->calc_perimeter();
	}
	function print_shape() {
		$this->print_comment();
		$this->print_area();
		$this->print_perimeter();
	}
	function calc_area() {
		$this->area = -1;
		$this->comment .= "<br/>" . "area calc by " . __CLASS__;
	}
	function calc_perimeter() {
		$this->perimeter = -1;
		$this->comment .= "<br/>" . "perimeter calc by " . __CLASS__;
	}
	function print_area() {
		if ($this->area == -1)
		{
			echo "<br/>" . "Class has not calculated Area!!";
		}
		else
		{
			echo "<br/>" . "Area is " . $this->area;
		}
	}
	function print_perimeter() {
		if ($this->perimeter == -1) 
		{
			echo "<br/" . "Class has not done perimeter calculation!";
		}
		else
		{
			echo "<br/>" . "Perimeter is " . $this->perimeter;
		}
	}
	function print_comment() {
		echo "<br/>" . $this->comment;
	}
}

class circle extends shape {
	var $radius;
	function __construct($radius1, $x = 0, $y = 0)
	{
		$this->radius = $radius1;
		$this->comment = "This is Circle";
		parent::__construct($x, $y);
	}
	function calc_area() {
		$area = 22.0 / 7.0 * $this->radius * $this->radius;
		$this->area = $area;
		$this->comment .= "<br/>" . "area calc by " . __CLASS__;
	}
	function calc_perimeter() {
		$this->perimeter = 2.0 * 22.0 / 7.0 * $this->radius;
		$this->comment .= "<br/>" . "perimeter calc by " . __CLASS__;
	}
}




	
