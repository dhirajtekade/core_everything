<?php
class MyClass{
	public $everyonesData;
	private $myData;
	protected $myCounter;

	public function setData($data){
		$this->myData = $data;
	}

	public function getData(){
		return $this->myData;
	}
}

?>