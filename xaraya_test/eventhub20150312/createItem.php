<?php

$values = Array
(
    'salutation' => "Mr.",
    'first_name' => "dhiraj",
    'last_name' => "tekade"
);	

        if (is_array($values)) 
        {
           $name = "";
            if (isset($values['first_name'])) 
			$name .= $values['first_name'];
            if (isset($values['last_name'])) $name .= " " . $values['last_name'];
			print_r($name);
            $name = trim($name);
            echo '<br>after trim: ';
            print_r($name);
        } 

    
    
/* private function copyNameToRolesname($values)
    {
        if (is_array($values)) {
            $name = "";
            if (isset($values['first_name'])) $name .= $values['first_name'];
            if (isset($values['last_name'])) $name .= " " . $values['last_name'];
            $name = trim($name);
            $this->properties['roles_name']->value = $name;
        } else {
            // We have a string, not an array. Copy it to the roles name property
            $this->properties['roles_name']->value = $values;
        }
        return true;
    }*/
    
    
  /*
a:3:{i:0;a:2:{s:2:"id";s:10:"salutation";s:5:"value";s:3:"Mr.";}i:1;a:2:{s:2:"id";s:10:"first_name";s:5:"value";s:6:"dhiraj";}i:2;a:2:{s:2:"id";s:9:"last_name";s:5:"value";s:6:"tekade";}}
 */  
?>