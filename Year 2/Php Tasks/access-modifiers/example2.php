<!--/*Calum Kerr-->
<?php
class Car {
  public $name;
  public $colour;
  public $weight;

  function set_name($n) {  // a public function (default)
    $this->name = $n;
  }
  protected function set_colour($n) { // a protected function
    $this->colour = $n;
  }
  private function set_weight($n) { // a private function
    $this->weight = $n;
  }
}

$audi = new Car();
$audi->set_name('Audi'); // OK
$audi->set_color('Yellow'); // ERROR
$audi->set_weight('900'); // ERROR
?>