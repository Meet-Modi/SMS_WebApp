<?php
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
	 
	    // insert query
	    $query = "INSERT INTO " . $this->table_name . "
	            SET
	            	userid = :userid;
	                firstname = :firstname,
	                lastname = :lastname,
	                password = :password";
	 
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 
	    // sanitize
	    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
	    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
	    $this->email=htmlspecialchars(strip_tags($this->email));
	    $this->password=htmlspecialchars(strip_tags($this->password));
	 
	    // bind the values
	    $stmt->bindParam(':firstname', $this->firstname);
	    $stmt->bindParam(':lastname', $this->lastname);
	    $stmt->bindParam(':email', $this->email);
	 
	    // hash the password before saving to database
	    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
	    $stmt->bindParam(':password', $password_hash);
	 
	    // execute the query, also check if query was successful
	    if($stmt->execute()){
	        return true;
	    }
	 
	    return false;
	}


}

?>