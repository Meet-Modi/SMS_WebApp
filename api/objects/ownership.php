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
	
				$query2 = "SELECT productcompany, producttype, capacity, rating FROM product";
				$query2 .= " WHERE productid='" . $product_id . "'";
				
				$result2 = $this->conn->query($query2);
	
				if($result2->num_rows>0) {
					//echo("IN IF 2 ");
					$row2 = $result2->fetch_assoc();		
					/*$json_output['productid'] = $product_id;
					$json_output['productcompany'] = $row2['productcompany'];
					$json_output['producttype'] = $row2['producttype'];
					$json_output['capacity'] = $row2['capacity'];
					$json_output['rating'] = $row2['rating'];
					$json_output['quantity'] = $quantity;*/
					$json_output[] = $row1 + $row2;
					//echo (json_encode($json_output));
				}else{	
					return "Product not found";
				}
			}
			return json_encode($json_output);
		}
		else{
			return "Customer doesn't have own any product.";
		}
		
		
	}

}


?>