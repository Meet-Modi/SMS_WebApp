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
	
	function createAmc() {

		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$this->amc_type_id=htmlspecialchars(strip_tags($this->amc_type_id));
		$this->amc_id=htmlspecialchars(strip_tags($this->amc_id));
		$this->from_date=htmlspecialchars(strip_tags($this->from_date));
		$this->period=htmlspecialchars(strip_tags($this->period));
		$this->quantity=htmlspecialchars(strip_tags($this->quantity));
		$this->total_services=htmlspecialchars(strip_tags($this->total_services));
		$this->amount=htmlspecialchars(strip_tags($this->amount));

		$query = "INSERT INTO ". $this->table_name;
		$query .= "(amcid, customerid, amctypeid, fromdate, period, quantity, totalservices, amount) VALUES";
		$query .= "('".$this->amc_id."','".$this->customer_id."','".$this->amc_type_id."','".$this->from_date."',";
		$query .= "'".$this->period."','".$this->quantity."','".$this->total_services."','".$this->amount."');";
		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		} 
	}

	public static function getAmcById($amc_id,$db) {
		$amc_id=htmlspecialchars(strip_tags($amc_id));
		$query = "SELECT amc.amcid, amc.customerid,customer.billingname,amc_type.amctype,amc.fromdate,amc.period,amc.quantity,amc.totalservices,amc.amount
		FROM amc
		INNER JOIN customer ON amc.customerid=customer.customerid
		INNER JOIN amc_type ON amc_type.amctypeid=amc.amctypeid
		WHERE amc.amcid='". $amc_id ."'";
		$result= $db->query($query);

		if($result->num_rows>0) {
			$row = $result->fetch_assoc();		
			$json_output = $row;
			return json_encode($json_output);
		}else{
			return false;
		}
	}

	public static function getAllAmc($db) {
		$query = "SELECT amc.amcid, amc.customerid,customer.billingname,amc_type.amctype,amc.fromdate,amc.period,amc.quantity,amc.totalservices,amc.amount FROM amc INNER JOIN customer ON amc.customerid=customer.customerid INNER JOIN amc_type ON amc_type.amctypeid=amc.amctypeid";
		$result = $db->query($query);
		$json_output = array();
		while($row = $result->fetch_assoc()) {			
			$json_output[] = $row;
		}
		return json_encode($json_output);
	}

	public static function getAmcId($customer_id,$amc_type_id,$from_date,$period,$quantity,$total_services,$db){
		$customer_id=htmlspecialchars(strip_tags($customer_id));
		$amc_type_id=htmlspecialchars(strip_tags($amc_type_id));
		$from_date=htmlspecialchars(strip_tags($from_date));
		$period=htmlspecialchars(strip_tags($period));
		$quantity=htmlspecialchars(strip_tags($quantity));
		$total_services=htmlspecialchars(strip_tags($total_services));

		$query = "SELECT amcid FROM amc WHERE customerid='".$customer_id."'";
		$query .= " AND amctypeid='".$amc_type_id."' AND fromdate='".$from_date."' AND period='".$period."'";
		$query .= " AND quantity='".$quantity."' AND totalservices='".$total_services."'";
		$result = $db->query($query);
		if($result->num_rows>0) {
			$row = $result->fetch_assoc();		
			$output = $row['amcid'];
			return $output;
		}else{
			echo json_encode(array("message" => "amc not found."));
			return false;
 		}
	}
	function updateAmcById() {

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
		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		} 
	}
}


?>