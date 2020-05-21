<?php
class Customer{

	//database connection and table name
	private $conn;
	private $table_name = "customer";

	//object properties
	public $customer_id;
	public $user_id;
	public $billing_name;
	public $place_id;
	public $contact_fname;
	public $contact_lname;
	public $contact_no1;
	public $contact_no2;
	public $address;
	public $city;
	public $state;
	public $pincode;
	public $email;

	public function __construct($db){
    	$this->conn = $db;
    }

}


?>