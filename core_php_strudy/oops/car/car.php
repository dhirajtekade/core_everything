<?php
class Car {

    // The properties
    public $comp;
    public $color = 'brown';
    public $hasSunRoof = true;
    public $tank;
 
    // The method that says hello
    public function hello()
    {
      return "Beep I am a <i>" . $this -> comp . 
         "</i>, and I am <i><span style= 'color:$this->color;'>" . $this -> color."</span></i>.";
    }
    
  // Add gallons of fuel to the tank when we fill it.
  public function fill($float)
  {
    $this-> tank += $float;
    return $this;
  }
  
  // Substract gallons of fuel from the tank as we ride the car.
  public function ride($float)
  {
    $miles = $float;
    $gallons = $miles/50;
    $this-> tank -= ($gallons);
    return $this;
  }
}
 
// We can now create an object from the class.
$bmw = new Car();
$mercedes = new Car();
 
// Set the values of the class properties.
$bmw -> color = 'blue';
$bmw -> comp = "BMW";
$mercedes -> comp = "Mercedes Benz";
 
// Call the hello method for the $bmw object.
echo $bmw -> hello();
// Add 10 gallons of fuel, then ride 40 miles, 
// and get the number of gallons in the tank. 
$tank = $bmw -> fill(10) -> ride(100) -> tank;
 echo "<br>";
// Print the results to the screen.
echo "The number of gallons left in the tank: " . $tank . " gal.";

?>