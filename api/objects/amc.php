<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class AMC{

	//database connection and table name
	private $conn;
	private $table_name = "amc";

	//object properties
	public $amc_id;
	public $customer_id;
	public $amc_type_id;
	public $from_date;
	public $period;
	public $quantity;
	public $total_services;
	public $amount;

	public function __construct($db){
    	$this->conn = $db;
	}
	
	function create($billing_name, $amc_type) {

		$this->amc_id=htmlspecialchars(strip_tags($this->amc_id));
		$this->from_date=htmlspecialchars(strip_tags($this->from_date));
		$this->period=htmlspecialchars(strip_tags($this->period));
		$this->quantity=htmlspecialchars(strip_tags($this->quantity));
		$this->total_services=htmlspecialchars(strip_tags($this->total_services));
		$this->amount=htmlspecialchars(strip_tags($this->amount));

		$billing_name=htmlspecialchars(strip_tags($billing_name));
		$amc_type=htmlspecialchars(strip_tags($amc_type));

		$query1 = "SELECT customerid FROM customer WHERE billingname = '" . $billing_name . "'";
		// prepare the query
		$result1 = $this->conn->query($query1);
		//echo("1st query executed");

		if ($result1->num_rows > 0) {
			$row = $result1->fetch_assoc();
			$this->customer_id = $row['customerid'];
			//echo("echo in if 1");

			$query2 = "SELECT amctypeid FROM amc_type WHERE amctype = '" . $amc_type . "'";
			// prepare the query
			$result2 = $this->conn->query($query2);
			if ($result2->num_rows > 0) {
				$row = $result2->fetch_assoc();
				$this->amc_type_id = $row['amctypeid'];
				//echo ("echo in if 2");
				$query3 = "INSERT INTO ". $this->table_name;
				$query3 .= "(amcid, customerid, amctypeid, fromdate, period, quantity, totalservices, amount) VALUES";
				$query3 .= "('".$this->amc_id."','".$this->customer_id."','".$this->amc_type_id."','".$this->from_date."',";
				$query3 .= "'".$this->period."','".$this->quantity."','".$this->total_services."','".$this->amount."');";

				if ($this->conn->query($query3) === TRUE) {
					//echo("3rd query executed");
					return true;
				} else {
					//echo "Error: " . $query2 . "<br>" . $this->conn->error;
					return false;
				} 
			}	
		} else {
			return false;
		}
	}

	function showAMC() {
		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$query1 = "SELECT * FROM ". $this->table_name ." WHERE amcid = '". $this->amc_id ."'";
		// prepare the query
		$result1 = $this->conn->query($query1);

		if($result1->num_rows>0) {
			$row = $result1->fetch_assoc();		
			$json_output = $row;
		}else{
			return "amc not found";
		}

		return json_encode($json_output);
	}

	function showAllAMC() {
		$query1 = "SELECT * FROM ". $this->table_name;
		// prepare the query
		$result1 = $this->conn->query($query1);

		$json_output = array();

		while($row = $result1->fetch_assoc()) {			
			$json_output[] = $row;
		}

		return json_encode($json_output);
	}

	function updateAMC() {

		$this->amc_id=htmlspecialchars(strip_tags($this->amc_id));
		$this->from_date=htmlspecialchars(strip_tags($this->from_date));
		$this->period=htmlspecialchars(strip_tags($this->period));
		$this->quantity=htmlspecialchars(strip_tags($this->quantity));
		$this->total_services=htmlspecialchars(strip_tags($this->total_services));
		$this->amount=htmlspecialchars(strip_tags($this->amount));

		$query = "UPDATE ". $this->table_name ;
		$query .= " SET fromdate = '". $this->from_date ."', period = '". $this->period ."', quantity = '". $this->quantity ."',";
		$query .= " totalservices = '". $this->total_services ."', amount = '". $this->amount ."'";
		$query .= " WHERE amcid = '". $this->amc_id ."'";
		
		// echo($query);

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