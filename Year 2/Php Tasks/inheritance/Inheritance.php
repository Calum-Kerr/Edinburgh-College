<?php

//The parent class
	class Car {
		protected $model;
		
		public function setModel($model){
			$this -> model = $model;
		}
	}
	
//the child class
	class SportsCar extends Car {
		public function hello(){
			return "Beep! I'm a <i>" . $this->model . "</i><br />";
		}
	}
	
$sportsCar1 = new SportsCar();
$sportsCar1 -> setModel('Mercedes Benz');
echo $sportsCar1 -> hello();

?>