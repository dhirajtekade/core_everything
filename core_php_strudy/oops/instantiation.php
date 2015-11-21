<?php
/*class MyClass{
	public $everyonesData;
	private $myData;
	protected $myCounter;
	public function setData($data){
		$this->myData = $data;
	}
	public function getData(){
		return $this->myData;
	}
}*/
//definition of the class must be before creating instances. If it is in another file, we can include it
include 'class.php';
$clsObject = new MyClass();
$clsObject->setData("Hello !Params");
print $clsObject-> getData();

?>