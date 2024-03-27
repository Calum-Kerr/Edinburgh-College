<?php


class Person {
	private $name;
	public $writename;

	function __construct($name) {
		$this->name = $name;
	}
	function writeName() {
		echo "My name is " . $this->name;
	}
	function getName() {
		return $this->name;
	}
	function setName($name) {
		$this->name = $name;
	}

}

echo ("Hello World! <br>");
$Calum = new Person("Calum");
$name = $Calum->getName();
$name = $name . " Kerr";
$Calum->setName($name);
$Calum->writeName();
?>