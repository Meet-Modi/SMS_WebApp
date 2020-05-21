<?php
class Employee{

	//database connection and table name
	private $conn;
	private $table_name = "employee";

	//object properties
	public $first_name;
	public $last_name;
	public $user_id;
	public $password;
	public $admin;
	public $Token;

	public function __construct($db){
    	$this->conn = $db;
    }


    // create new user record
	function create(){
	 
	    // insert query
	    $query = "INSERT INTO " . $this->table_name . "
            SET
                first_name = :first_name,
                last_name = :last_name,
                user_id = :user_id,
                password = :password,
                admin = :admin";
 
	    // prepare the query
	    $stmt = $this->conn->prepare($query);
	 	echo($this->first_name);
	    // sanitize
	    $this->first_name=htmlspecialchars(strip_tags($this->first_name));
	    $this->last_name=htmlspecialchars(strip_tags($this->last_name));
	    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
	    $this->password=htmlspecialchars(strip_tags($this->password));
	    $this->admin=htmlspecialchars(strip_tags($this->admin));
	 	
	    // bind the values
	    $stmt->bindParam(':firstname', $this->first_name);
	    $stmt->bindParam(':lastname', $this->last_name);
	    $stmt->bindParam(':email', $this->user_id);
	    $stmt->bindParam(':admin', $this->admin);
	 
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