<?php

class car {
	//code goes here
	public $name;
	public $colour;
	
	//methods
	function set_name($name){
	$this->name=$name;
	}
	function get_name(){
	return $this->name;
	}
	
}
//objects
	$audi = new car();
	$nissan = new car();
	
	$audi->set_name('Audi');
	$nissan->set_name('Nissan');
	
	echo $audi->get_name();
	echo"<br>";
	echo $nissan->get_name();
	
	
?>
