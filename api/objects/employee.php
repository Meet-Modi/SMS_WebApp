<?php
class Employee{

	//database connection and table name
	private $conn;
	private $table_name = "employee";

	//object properties
	public $first_name;
	public $last_name;
	public $user_id;
	public $password
	public $admin;
	public $Token;

	public function __construct($db){
    	$this->conn = $db;
    }

}

?>