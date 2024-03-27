<?php

	class User {
		protected $username;
		
		public function getUsername(){
			return $this -> username;
		}
		
		public function setUsername($username){
			$this -> username = $username;
		}
	}
	
	interface Author {
		public function getAuthorPrivileges();
		
		public function setAuthorPrivileges($array);
		
	}
	
	interface Editor {
		public function getEditorPrivileges();
		
		public function setEditorPrivileges($array);
	}
	
	class AuthorEditor extends User implements Author,Editor {
    private $authorPrivilegesArray = array();
    private $editorPrivilegesArray = array();
    
    
    public function getAuthorPrivileges() {
        return $this -> authorPrivilegesArray;    
    }

    public function getEditorPrivileges() {
        return $this -> editorPrivilegesArray;    
    }

    public function setAuthorPrivileges($authorPrivilegesArray) {
        $this -> authorPrivilegesArray = $authorPrivilegesArray;    
    }

    public function setEditorPrivileges($editorPrivilegesArray) {
        $this -> editorPrivilegesArray = $editorPrivilegesArray;    
    }

} 
	
$user = new AuthorEditor();
$user -> setUsername("Calum");
$user -> setAuthorPrivileges(array("Wrtie text", "add punctuation"));
$user -> setEditorPrivileges(array("Wrtie text", "add punctuation"));	

$username = $user -> getUsername();
echo $username . " has the following privileges: ";

$userPrivileges = array_merge($user -> getAuthorPrivileges(), $user -> getEditorPrivileges());
echo implode(",", $userPrivileges);
echo ".";

?>