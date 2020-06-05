<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Complaint{

	//database connection and table name
	private $conn;
	private $table_name = "complaint";

	//object properties
	public $complaint_id;
	public $customer_id;
	public $complaint_type_id;
	public $status;

	public function __construct($db){
    	$this->conn = $db;
    }

    function create($billing_name, $complaint_type) {

		$this->complaint_id=htmlspecialchars(strip_tags($this->complaint_id));
		$this->remarks=htmlspecialchars(strip_tags($this->remarks));
		$this->status=htmlspecialchars(strip_tags($this->status));

		$billingname=htmlspecialchars(strip_tags($billing_name));
		$complainttype=htmlspecialchars(strip_tags($complaint_type));

		$query1 = "SELECT customerid FROM customer WHERE billingname = '" . $billingname ."'";
		// prepare the query
		$result1 = $this->conn->query($query1);
		//echo("1st query executed");

		if ($result1->num_rows > 0) {
			$row = $result1->fetch_assoc();
			$this->customer_id = $row['customerid'];
			//echo("echo in if 1");

			$query2 = "SELECT complaintypeid FROM complain_type WHERE complaintype = '". $complainttype ."'";
			// prepare the query
			$result2 = $this->conn->query($query2);
			if ($result2->num_rows > 0) {
			//	echo("echo in if 2");
				$row = $result2->fetch_assoc();
				$this->complaint_type_id = $row['complaintypeid'];
				$query3 = "INSERT INTO ". $this->table_name ;
				$query3 .= "(complaintid, customerid, complainttypeid, remarks, status) VALUES";
				$query3 .= "('". $this->complaint_id ."','". $this->customer_id ."','". $this->complaint_type_id ."',";
				$query3 .= "'". $this->remarks ."','". $this->status ."')";

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

	function showComplain() {
		$this->complaint_id=htmlspecialchars(strip_tags($this->complaint_id));
		$query1 = "SELECT * FROM ". $this->table_name ." WHERE complaintid = '". $this->complaint_id ."'";
		// prepare the query
		$result1 = $this->conn->query($query1);

		if($result1->num_rows>0) {
			$row = $result1->fetch_assoc();		
			$json_output = $row;
		}else{
			return "complaint not found";
		}

		return json_encode($json_output);
	}

	function showAllComplain() {
		$query1 = "SELECT * FROM ". $this->table_name;
		// prepare the query
		$result1 = $this->conn->query($query1);

		$json_output = array();

		while($row = $result1->fetch_assoc()) {			
			$json_output[] = $row;
		}

		return json_encode($json_output);
	}

	function updateComplain() {

		$this->complaint_id=htmlspecialchars(strip_tags($this->complaint_id));
		$this->remarks=htmlspecialchars(strip_tags($this->remarks));
		$this->status=htmlspecialchars(strip_tags($this->status));

		$query = "UPDATE ". $this->table_name ;
		$query .= " SET remarks = '". $this->remarks ."', status = '". $this->status ."'";
		$query .= " WHERE complaintid = '". $this->complaint_id ."'";
		
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