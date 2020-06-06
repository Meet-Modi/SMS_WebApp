<?php
class Complaint{

	private $conn;
	private $table_name = "complaint";

	//object properties
	public $complaint_id;
	public $customer_id;
	public $amc_id;
	public $date;
	public $complaint_type_id;
	public $status;

	public function __construct($db){
    	$this->conn = $db;
    }

	function createComplaint(){
		
		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$this->amc_id=htmlspecialchars(strip_tags($this->amc_id));
		$this->date=htmlspecialchars(strip_tags($this->date));
		$this->complaint_type_id=htmlspecialchars(strip_tags($this->complaint_type_id));
		$this->status=htmlspecialchars(strip_tags($this->status));

		$query = "INSERT INTO ". $this->table_name;
		$query .= "(customerid, amcid, date, complainttypeid, status) VALUES";
		$query .= "('". $this->customer_id ."','". $this->amc_id ."','".$this->date."','". $this->complaint_type_id ."',";
		$query .= "'". $this->status ."')";
		if ($this->conn->query($query) === TRUE) {
			return true;
		} 
		else {
			return false;
		} 
	}

	public static function getAllComplaints($db){
		$query = "SELECT * FROM complaint";
		$result = $db->query($query);

		$output = array();

		while($row = $result->fetch_assoc()) {			
			$output[] = $row;
		}
		return json_encode($output);		
	}
	
	public static function getComplaintById($complaint_id,$db){
		$query = "SELECT * FROM ". $this->table_name ." WHERE complaintid='".$complaint_id."'";
		$result = $db->query($query);

		$output = array();

		while($row = $result->fetch_assoc()) {			
			$output[] = $row;
		}
		return json_encode($output);
	}

	public static function getComplaintid($customer_id,$amc_id,$date,$complaint_type_id,$db){

		$customer_id=htmlspecialchars(strip_tags($customer_id));
		$amc_id=htmlspecialchars(strip_tags($amc_id));
		$date=htmlspecialchars(strip_tags($date));
		$complaint_type_id=htmlspecialchars(strip_tags($complaint_type_id));

		$query = "SELECT complaintid FROM complaint WHERE customerid='".$customer_id."'";
		$query .= "AND amcid='".$amc_id."' AND date='".$date."' AND complainttypeid='".$complaint_type_id."'";
		$result = $db->query($query);
		if($result->num_rows>0) {
			$row = $result->fetch_assoc();		
			$output = $row['complaintid'];
			return $output;
		}else{
			echo json_encode(array("message" => "Complaint not found."));
			return false;
 		}
	}

	function updateComplaintById(){

		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$this->amc_id=htmlspecialchars(strip_tags($this->amc_id));
		$this->date=htmlspecialchars(strip_tags($this->date));
		$this->complaint_type_id=htmlspecialchars(strip_tags($this->complaint_type_id));

		$query = "UPDATE complaint SET customerid='".$this->customer_id."',amcid='".$this->amc_id."',";
		$query .= " date='".$this->date."',complainttypeid='".$this->complaint_type_id."',";
		$query .= "status='".$this->status."' WHERE complaintid='".$this->complaint_id."'";
		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		} 
	}

	function deleteComplaintById(){
		$query = "DELETE FROM complaint WHERE complaintid='".$this->complaint_id."'";
		if ($this->conn->query($query) === TRUE) {
			return true;
		} else {
			return false;
		}
	}
}
?>