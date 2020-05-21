<?php
class Product{

	//database connection and table name
	private $conn;
	private $table_name = "product";

	//object properties
	public $product_id;
	public $product_company;
	public $product_type;
	public $capacity;
	public $rating;

	public function __construct($db){
    	$this->conn = $db;
    }

}


?>