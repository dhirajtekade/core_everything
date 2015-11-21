<?php 
include('DataProperty.php');
class SelectProperty extends DataProperty {
	
	function getOption() {
		$options = array ("[0]"=>array("[id]"=>"arche", "[name]"=>"arche"), "[1]"=>array("[id]"=>"default", "[name]"=>"default"));
		$this->value = array();
		foreach ($options as $option) {
            if ($option['id'] == $this->value) {
                
            	//if ($check) return true;
                //return $option['name'];
            }
        }
	}
	
	function getValue()
    {
		return $this->getOption();
    }	
	
	
}


?>