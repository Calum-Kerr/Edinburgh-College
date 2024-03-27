<?php
 
	abstract class User {
		protected $username;
		
		abstract public function stateYourRole();
		
		public function setName($name){
			$this -> $username = $name;
		}
		
		public function getName(){
			return $this -> $username;
		}
	}
	
	class Admin extends User {
		
		public function stateYourRole(){
			return "Admin"; 
		}
	}
	
	class Viewer extends User {
		
		public function stateYourRole(){
			return "Viewer"; 
		}
	}
	
$name = new Admin();
$name -> setName("Balthazar");
echo $name -> stateYourRole();
  
	
?>