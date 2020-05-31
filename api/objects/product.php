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
	public $model_no;

	public function __construct($db){
    	$this->conn = $db;
	}
	
	function addProduct() {
		$this->product_company=htmlspecialchars(strip_tags($this->product_company));
		$this->product_type=htmlspecialchars(strip_tags($this->product_type));
		$this->capacity=htmlspecialchars(strip_tags($this->capacity));
		$this->rating=htmlspecialchars(strip_tags($this->rating));
		$this->model_no=htmlspecialchars(strip_tags($this->model_no));

		$query = "INSERT INTO " . $this->table_name . " (modelno, productcompany, producttype, capacity, rating) VALUES";
		$query .= "('" . $this->model_no . "', '" . $this->product_company . "', '" . $this->product_type . "', '" . $this->capacity . "', '" . $this->rating . "')";

		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		} 
	}

	function updateProduct() {
		$this->product_id=htmlspecialchars(strip_tags($this->product_id));
		$this->product_company=htmlspecialchars(strip_tags($this->product_company));
		$this->product_type=htmlspecialchars(strip_tags($this->product_type));
		$this->capacity=htmlspecialchars(strip_tags($this->capacity));
		$this->rating=htmlspecialchars(strip_tags($this->rating));
		$this->model_no=htmlspecialchars(strip_tags($this->model_no));

		$query = "UPDATE " . $this->table_name . " SET modelno = '" . $this->model_no . "', productcompany = '" . $this->product_company . "',";
		$query .= " producttype = '" . $this->product_type . "', capacity = '" . $this->capacity . "', rating = '" . $this->rating . "'";
		$query .= " WHERE productid = '" . $this->product_id . "'";


		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		} 
	}

	function deleteProduct() {
		$this->product_id=htmlspecialchars(strip_tags($this->product_id));
		$this->model_no=htmlspecialchars(strip_tags($this->model_no));
		$query = "DELETE FROM " . $this->table_name . " WHERE productid = '" . $this->product_id . "' OR modelno ='" . $this->model_no . "'";

		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		} 
	}

	function getProductId(){
		$this->product_company=htmlspecialchars(strip_tags($this->product_company));
		$this->product_type=htmlspecialchars(strip_tags($this->product_type));
		$this->capacity=htmlspecialchars(strip_tags($this->capacity));
		$this->rating=htmlspecialchars(strip_tags($this->rating));
		$this->model_no=htmlspecialchars(strip_tags($this->model_no));

		$query = "SELECT productid FROM " . $this->table_name;
		$query .= " WHERE modelno = '" . $this->model_no . "' AND productcompany='" . $this->product_company . "' AND producttype='" . $this->product_type . "'";
		$query .= " AND capacity='" . $this->capacity . "' AND rating='" . $this->rating . "'";

		$result = $this->conn->query($query);

		if($result->num_rows>0) {
			$row = $result->fetch_assoc();		
			$json_output = $row;
		}else{
			return json_encode(array("message" => "PRODUCT NOT FOUND"));
		}
		return json_encode($json_output);
	}

	function showAllProduct(){
		
		$query1 = "SELECT * FROM " . $this->table_name;		
		$result1 = $this->conn->query($query1);
		$json_output = array();
		
		if($result1->num_rows>0) {
			while($row1 = $result1->fetch_assoc()){
				$json_output[] = $row1;
			}	
			return json_encode($json_output);	
		}else{
			return "Product not found";
		}
		return json_encode($json_output);
	}
}


?>