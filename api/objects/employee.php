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
		$query .= "('".$this->userid."','".$this->firstname."','".$this->lastname."','".$password_hash."',".$this->admin.");";
		
		if ($this->conn->query($query) === TRUE) {
  			return true;
		} else {
  			echo "Error: " . $query . "<br>" . $this->conn->error;
  			return false;
		}

	}

	// check if given email exist in the database
	function useridExists(){
	
		// query to check if email exists
		$this->userid=htmlspecialchars(strip_tags($this->userid));
		
	$query = "SELECT firstname, lastname, admin, password FROM " . $this->table_name . " WHERE userid = '". $this->userid ."'";
		// prepare the query
		$result = $this->conn->query($query);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$this->firstname = $row['firstname'];
			$this->lastname = $row['lastname'];
			$this->password = $row['password'];
			$this->admin = $row['admin'];
			return true;
		} else {
			return false;
		}
		
	/*	
		$stmt = $this->conn->prepare( $query );
	
		// sanitize
		
	
		// bind given email value
		$stmt->bindParam(1, $this->userid);
	
		// execute the query
		$stmt->execute();
	
		// get number of rows
		$num = $stmt->rowCount();
	
		// if email exists, assign values to object properties for easy access and use for php sessions
		if($num>0){
	
			// get record details / values
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
			// assign values to object properties
			
	
			// return true because email exists in the database
			return true;
		}
	
		// return false if email does not exist in the database
		return false;*/
	}


}

?>