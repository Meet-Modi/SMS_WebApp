<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Employee{

	private $conn;
	private $table_name = "employee";

	public $userid;
	public $firstname;
	public $lastname;
	public $password;

	public function __construct($db){
    	$this->conn = $db;
	}
	
	function deleteEmployee(){
		$this->userid=htmlspecialchars(strip_tags($this->userid));
		$query = "DELETE FROM employee WHERE userid ='".$this->userid."'";
		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		}
				
	}

	function updateEmployee(){
	    $this->userid=htmlspecialchars(strip_tags($this->userid));
	    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
	    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
	
		$query = "UPDATE employee SET firstname='".$this->firstname."',lastname='".$this->lastname."' WHERE userid='".$this->userid."'";
//		echo($query);
		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		}
	}
	function create($admin_password){
	 
	    $this->userid=htmlspecialchars(strip_tags($this->userid));
	    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
	    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
	    $this->password=htmlspecialchars(strip_tags($this->password));
	 	$password_hash = password_hash($this->password, PASSWORD_BCRYPT);
		
		$query1 = "SELECT admin_id FROM admin WHERE password ='".$admin_password."'";
		$result = $this->conn->query($query1);

		if ($result->num_rows > 0) {
			
			$query2 = "INSERT INTO employee ";
			$query2 .= "(userid, firstname, lastname, password) VALUES";
			$query2 .= "('".$this->userid."','".$this->firstname."','".$this->lastname."','".$password_hash."');";
			
			if ($this->conn->query($query2) === TRUE) {
				return true;
			} else {
				return false;
			} 
			
		} else {
			return false;
		}

	}
	function useridExists(){
	
		$this->userid=htmlspecialchars(strip_tags($this->userid));
		
		$query = "SELECT firstname, lastname, password FROM " . $this->table_name . " WHERE userid = '". $this->userid ."'";
		$result = $this->conn->query($query);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$this->firstname = $row['firstname'];
			$this->lastname = $row['lastname'];
			$this->password = $row['password'];
			return true;
		} else {
			return false;
		}	
	}

	public static function getEmployeeNamesDropdown($db){
		$query = "SELECT firstname, lastname FROM employee";
		$result = $db->query($query);
		$output = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {			
				$output[] = $row;
			}	
			return $output;
		}
		else{
			return false;
		}

	}

	public static function getAllEmployees($db){
		$query = "SELECT userid,firstname,lastname FROM employee";
		$result = $db->query($query);
		$output = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {			
				$output[] = $row;
			}	
			return $output;
		}
		else{
			return false;
		}
	}
}

?>