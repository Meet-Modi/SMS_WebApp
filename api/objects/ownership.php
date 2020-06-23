<?php
class Ownership{

	private $conn;
	private $table_name = "ownership";

	public $customer_id;
	public $product_id;
	public $quantity;

	public function __construct($db){
    	$this->conn = $db;
	}
	
	function createOwnership(){
		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$this->product_id=htmlspecialchars(strip_tags($this->product_id));
		$this->quantity=htmlspecialchars(strip_tags($this->quantity));

		$query = "INSERT INTO ". $this->table_name ;
		$query .= "(customerid, productid, quantity) VALUES";
		$query .= "('".$this->customer_id."','".$this->product_id."','".$this->quantity."')";

		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		} 
	}

	function deleteOwnership(){
		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$this->product_id=htmlspecialchars(strip_tags($this->product_id));
		$this->quantity=htmlspecialchars(strip_tags($this->quantity));

		$query = "DELETE FROM " .$this->table_name. " WHERE customerid='".$this->customer_id."' AND productid='".$this->product_id."'";	
       	if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		} 
	}

	function updateOwnership($oldproduct_id){
		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$this->product_id=htmlspecialchars(strip_tags($this->product_id));
		$this->quantity=htmlspecialchars(strip_tags($this->quantity));

		$oldproduct_id=htmlspecialchars(strip_tags($oldproduct_id));

		$query = "UPDATE " .$this->table_name." SET customerid= '" .$this->customer_id. "', productid = '".$this->product_id."',quantity='".$this->quantity."' WHERE customerid='".$this->customer_id."' AND productid='".$oldproduct_id."'";	
		 echo($query);
		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		} 
	}

	function showProduct() {

		$query1 = "SELECT productid, quantity FROM " . $this->table_name;
		$query1 .= " WHERE customerid='" . $this->customer_id . "'";

		$result1 = $this->conn->query($query1);

		$json_output = array();
		if($result1->num_rows>0) {
			//echo("IN IF 1 ");
			while($row1 = $result1->fetch_assoc()) {			
				//echo("WHILE ");
				$product_id = $row1['productid'];
				$quantity = $row1['quantity'];
	
				$query2 = "SELECT productcompany, producttype, capacity, rating, modelno FROM product";
				$query2 .= " WHERE productid='" . $product_id . "'";
				
				$result2 = $this->conn->query($query2);
	
				if($result2->num_rows>0) {
					$row2 = $result2->fetch_assoc();		
					$json_output[] = $row1 + $row2;
				}else{	
					return false;
				}
			}
			return json_encode($json_output);
		}
		else{
			return false;
		}		
	}
}

?>