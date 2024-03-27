<!--/*Calum Kerr-->
<?php
class car{
//properties
	public $name;
	public $colour;
	public $model;
	
//methods
	function set_name($name){
	$this->name = $name;
	}
	function get_name(){
	return $this->name;
	}
	function set_colour($colour){
	$this->colour = $colour;
	}
	function get_colour(){
	return $this->colour;
	}
	function set_model($model){
	$this->model = $model;
	}
	function get_model(){
	return $this->model;
	}
}
//objects
	$audi = new Car();
	$audi->set_name('Audi');
	$audi->set_colour('Red');
	$audi->set_model('Saloon');
	echo "Name: " . $audi->get_name();
	echo "<br>";
	echo "Colour: " . $audi->get_colour();
	echo "<br>";
	echo "Model: " . $audi->get_Model();
	echo "<br>";
	echo "<br><br>";
	
	$BMW = new Car();
	$BMW->set_name('BMW');
	$BMW->set_colour('Silver');
	$BMW->set_model('Hatchback');
	echo "Name: " . $BMW->get_name();
	echo "<br>";
	echo "Colour: " . $BMW->get_colour();
	echo "<br>";
	echo "Model: " . $BMW->get_Model();
	echo "<br>";
	echo "<br><br>";
	
	$Ford = new Car();
	$Ford->set_name('Ford');
	$Ford->set_colour('Blue');
	$Ford->set_model('SUV');
	echo "Name: " . $Ford->get_name();
	echo "<br>";
	echo "Colour: " . $Ford->get_colour();
	echo "<br>";
	echo "Model: " . $Ford->get_Model();
	echo "<br>";
	echo "<br><br>";
	
?>
