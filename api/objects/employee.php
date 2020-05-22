<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Employee{

	//database connection and table name
	private $conn;
	private $table_name = "employee";

	//object properties
	public $userid;
	public $firstname;
	public $lastname;
	public $password;
	public $admin;

	public function __construct($db){
    	$this->conn = $db;
    }

    // create new user record
	function create(){
	 
	    $this->userid=htmlspecialchars(strip_tags($this->userid));
	    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
	    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
	    $this->password=htmlspecialchars(strip_tags($this->password));
	 	$this->admin=htmlspecialchars(strip_tags($this->admin));

	    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
	 	
		$query = "INSERT INTO employee ";
		$query .= "(userid, firstname, lastname, password, admin) VALUES";
		$query .= "('".$this->userid."','".$this->firstname."','".$this->lastname."','".$this->password."',".$this->admin.");";
		
		if ($this->conn->query($query) === TRUE) {
  			return true;
		} else {
  			echo "Error: " . $query . "<br>" . $this->conn->error;
  			return false;
		}

	}


}

?>