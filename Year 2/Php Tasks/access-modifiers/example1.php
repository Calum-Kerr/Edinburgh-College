<!--/*Calum Kerr-->
<?php
class car {
	public $name;
	protected $colour;
	private $weight;
	}
	
	$audi = new Car();
	$audi->name ='Audi';//OK
	$audi->colour ='Yellow';//ERROR
	$audi->weight ='900'//ERROR

?>