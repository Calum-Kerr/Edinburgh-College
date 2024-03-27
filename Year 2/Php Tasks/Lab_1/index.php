<?php

//some of the code might be done incorrectly or different, not sure.

class Person {
	private $name;
	public $writeName;
	private $surname;
	
	function __construct($name){
		$this -> name = $name;
	}
	function writeName($writeName){
		return $this -> name;
	}
	function getName(){
		return $this->name;
	}
	function setName($name){
		$this->name = $name . $surname;
	}
	
	
}
echo("Hello World! <br>");
$name = new Person("Calum");
$surname = ("Kerr");
$writeName =("My name is " );
$name->setName($name);
echo $writeName . $name-> getName();
?>