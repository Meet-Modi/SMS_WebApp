<?php
class Ownership{

	//database connection and table name
	private $conn;
	private $table_name = "ownership";

	//object properties
	public $customer_id;
	public $product_id;
	public $quantity;

	public function __construct($db){
    	$this->conn = $db;
    }

}


?>