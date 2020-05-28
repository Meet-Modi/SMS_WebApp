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
	
	function create(){
		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$this->product_id=htmlspecialchars(strip_tags($this->product_id));
		$this->quantity=htmlspecialchars(strip_tags($this->quantity));

		$query = "INSERT INTO ". $this->table_name ;
		$query .= "(customerid, productid, quantity) VALUES";
		$query .= "('".$this->customer_id."','".$this->product_id."','".$this->quantity."')";

		if ($this->conn->query($query) === TRUE) {
			//echo("3rd query executed");
			return true;
		} else {
			//echo "Error: " . $query2 . "<br>" . $this->conn->error;
			return false;
		} 
	}

}


?>