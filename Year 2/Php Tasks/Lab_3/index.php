<?php

//I think it's correct?

	class User {
		private $username;
		
		function setName($username){
			$this -> user = $username;
		}
	}
	
	class Admin extends User {
		public function expressYourRole(){
			return "Admin"; 
		}
		
		public function sayHello(){
			return "Hello admin, " . $this -> user . ".";
		}
	}

$admin1 = new Admin();
$admin1 -> setName('Balthazar');
echo $admin1 -> sayHello();	

?>