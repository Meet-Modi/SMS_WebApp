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
	
	function getProductId(){
		$this->product_company=htmlspecialchars(strip_tags($this->product_company));
		$this->product_type=htmlspecialchars(strip_tags($this->product_type));
		$this->capacity=htmlspecialchars(strip_tags($this->capacity));
		$this->rating=htmlspecialchars(strip_tags($this->rating));

		$query = "SELECT productid FROM " . $this->table_name;
		$query .= " WHERE productcompany='" . $this->product_company . "' AND producttype='" . $this->product_type . "'";
		$query .= " AND capacity='" . $this->capacity . "' AND rating='" . $this->rating . "'";

		$result = $this->conn->query($query);

		if($result->num_rows>0) {
			echo("IN IF");
			$row = $result->fetch_assoc();		
			$json_output = $row;
		}else{
			echo("NOT");
			return "Product not found";
		}

		return json_encode($json_output);

	}

	function showAllProduct(){
		
		$query1 = "SELECT * FROM " . $this->table_name;
		
		$result1 = $this->conn->query($query1);

		$json_output = array();

		if($result1->num_rows>0) {
			//echo("IN IF");
			while($row1 = $result1->fetch_assoc()){
				$json_output[] = $row1;
				/*$product_type_id = $row1['producttypeid'];
				$query2 = "SELECT producttype FROM product_type WHERE producttypeid = '" . $product_type_id . "'";

				$result2 = $this->conn->query($query2);

				if($result2->num_rows>0) {
					//echo("IN IF");
					$row2 = $result1->fetch_assoc();
					$json_output[] = $row1 + $row2;
				}else{
					//echo("NOT");
					return "Product type not found";
				}*/
			}	
			return json_encode($json_output);	
		}else{
			//echo("NOT");
			return "Product not found";
		}

		return json_encode($json_output);

	}

}


?>