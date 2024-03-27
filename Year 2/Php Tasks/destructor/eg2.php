<?php
class Car {
  public $name;
  public $colour;

  function __construct($name) {
    $this->name = $name;
  }
  function __destruct() {
    echo "The car is a {$this->name}.";
  }
}

$audi = new Car("Audi");
?>