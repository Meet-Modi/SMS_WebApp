<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Customer{

	//database connection and table name
	private $conn;
	private $table_name = "customer";

	//object properties
	public $customer_id;
	public $user_id;
	public $billing_name;
	public $place_id;
	public $contact_fname;
	public $contact_lname;
	public $contact_no1;
	public $contact_no2;
	public $address;
	public $city;
	public $state;
	public $pincode;
	public $email;

	public function __construct($db){
    	$this->conn = $db;
	}
	
	function create($user_fname, $user_lname, $place) {

		$this->billing_name=htmlspecialchars(strip_tags($this->billing_name));
		$this->contact_fname=htmlspecialchars(strip_tags($this->contact_fname));
		$this->contact_lname=htmlspecialchars(strip_tags($this->contact_lname));
		$this->contact_no1=htmlspecialchars(strip_tags($this->contact_no1));
		$this->contact_no2=htmlspecialchars(strip_tags($this->contact_no2));
		$this->address=htmlspecialchars(strip_tags($this->address));
		$this->city=htmlspecialchars(strip_tags($this->city));
		$this->state=htmlspecialchars(strip_tags($this->state));
		$this->pincode=htmlspecialchars(strip_tags($this->pincode));
		$this->email=htmlspecialchars(strip_tags($this->email));

		$firstname=htmlspecialchars(strip_tags($user_fname));
		$lastname=htmlspecialchars(strip_tags($user_lname));
		$place_type=htmlspecialchars(strip_tags($place));

		$query1 = "SELECT userid FROM employee WHERE firstname = '" . $firstname . "' AND lastname = '" . $lastname ."'";
		// prepare the query
		$result1 = $this->conn->query($query1);

		if ($result1->num_rows > 0) {
			$row = $result1->fetch_assoc();
			$this->user_id = $row['userid'];

			$query2 = "SELECT placeid FROM place WHERE placetype = '" . $place_type ."'";
			// prepare the query
			$result2 = $this->conn->query($query2);
			if ($result2->num_rows > 0) {
				$row = $result2->fetch_assoc();
				$this->place_id = $row['placeid'];
				$query3 = "INSERT INTO ". $this->table_name ;
				$query3 .= "(userid, billingname, placeid, firstname, lastname, contactno1, contactno2, address, city, state, pincode, email) VALUES";
				$query3 .= "('".$this->user_id."','".$this->billing_name."','".$this->place_id."',";
				$query3 .= "'".$this->contact_fname."','".$this->contact_lname."','".$this->contact_no1."','".$this->contact_no2."',";
				$query3 .= "'".$this->address."','".$this->city."','".$this->state."','".$this->pincode."','".$this->email."');";

				if ($this->conn->query($query3) === TRUE) {
					return true;
				} else {
					return false;
				} 
			}	
		} else {
			return false;
		}
	}

	public static function getAllPlaceType($db){
		$query = "SELECT placetype FROM place";
		$result = $db->query($query);
		
		$output = array();
		if($result->num_rows>0) {
			while($row = $result->fetch_assoc()) {
				$output[] = $row;
			}
			return $output;
		}else{
			return false;
		}
	}

	public static function getAllBillingName($db){
		$query = "SELECT billingname FROM customer";
		$result = $db->query($query);
		
		$output = array();
		if($result->num_rows>0) {
			while($row = $result->fetch_assoc()) {
				$output[] = $row;
			}
			return $output;
		}else{
			return false;
		}
	}
	function showCustomer() {
		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$query1 = "SELECT * FROM ". $this->table_name ." WHERE customerid = '". $this->customer_id ."'";
		$result1 = $this->conn->query($query1);

		if($result1->num_rows>0) {
			$row1 = $result1->fetch_assoc();
			$placeid = $row1['placeid'];
			$query2 = "SELECT placetype FROM place WHERE placeid = '". $placeid ."'";
			$result2 = $this->conn->query($query2);
			if($result2->num_rows>0) {
				$row2 = $result2->fetch_assoc();
				$json_output = $row1 + $row2;
			}else{
				return "Place not exist";
			}
		}else{
			return "customer not found";
		}

		return json_encode($json_output);
	}

	public static function getCustomerIDBillingName($db){
		$query = "SELECT customerid,billingname FROM customer";
		$result = $db->query($query);
		$output = array();
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()) {			
				$output[] = $row;
			}
			return $output;
		}
		else{
			return false;
		}
	}

	function showAllCustomer() {
		$query1 = "SELECT * FROM ". $this->table_name;
		$result1 = $this->conn->query($query1);
		
		$json_output = array();
		if($result1->num_rows>0) {
			while($row1 = $result1->fetch_assoc()) {			
				$placeid = $row1['placeid'];
				$query2 = "SELECT placetype FROM place WHERE placeid = '". $placeid ."'";
				// prepare the query
				$result2 = $this->conn->query($query2);
				if($result2->num_rows>0) {
					$row2 = $result2->fetch_assoc();
					$json_output[] = $row1 + $row2;
				}else{
					return "Place not exist";
				}
			}
		}else{
			return json_encode($json_output);
		}
		return json_encode($json_output);
	}

	function updateCustomer($place) {

		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$this->billing_name=htmlspecialchars(strip_tags($this->billing_name));
		$this->contact_fname=htmlspecialchars(strip_tags($this->contact_fname));
		$this->contact_lname=htmlspecialchars(strip_tags($this->contact_lname));
		$this->contact_no1=htmlspecialchars(strip_tags($this->contact_no1));
		$this->contact_no2=htmlspecialchars(strip_tags($this->contact_no2));
		$this->address=htmlspecialchars(strip_tags($this->address));
		$this->city=htmlspecialchars(strip_tags($this->city));
		$this->state=htmlspecialchars(strip_tags($this->state));
		$this->pincode=htmlspecialchars(strip_tags($this->pincode));
		$this->email=htmlspecialchars(strip_tags($this->email));

		$place=htmlspecialchars(strip_tags($place));

		$query2 = "SELECT placeid FROM place WHERE placetype = '" . $place ."'";
		$result2 = $this->conn->query($query2);

		if ($result2->num_rows > 0) {
			$row2 = $result2->fetch_assoc();
			$this->place_id = $row2['placeid'];

			$query = "UPDATE ". $this->table_name ;
			$query .= " SET billingname = '". $this->billing_name ."', placeid= '". $this->place_id . "', firstname = '". $this->contact_fname ."', lastname = '". $this->contact_lname ."',";
			$query .= " contactno1 = '". $this->contact_no1 ."', contactno2 = '". $this->contact_no2 ."', address = '". $this->address ."',";
			$query .= " city = '". $this->city ."', state = '". $this->state ."', pincode = '". $this->pincode ."', email = '". $this->email ."'";
			$query .= " WHERE customerid = '". $this->customer_id ."'";
		

			if ($this->conn->query($query) === TRUE) {
				return true;
			} else {
				return false;
			} 
		}
		else{
			return false;
		}
	}

	function deleteCustomer() {
		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$query1 = "SELECT * FROM ". $this->table_name ." WHERE customerid = '". $this->customer_id ."'";
		$result1 = $this->conn->query($query1);

		if($result1->num_rows>0) {
			$row1 = $result1->fetch_assoc();
			$placeid = $row1['placeid'];
			$query2 = "SELECT placetype FROM place WHERE placeid = '". $placeid ."'";
			$result2 = $this->conn->query($query2);
			if($result2->num_rows>0) {
				$row2 = $result2->fetch_assoc();
				$json_output = $row1 + $row2;
			}else{
				return "Place not exist";
			}
		}else{
			return "customer not found";
		}

		return json_encode($json_output);
	}

	public static function getCustomerIdFromBillingName($billing_name, $db){
		$billing_name=htmlspecialchars(strip_tags($billing_name));

		$query = "SELECT customerid FROM customer WHERE billingname = '" . $billing_name ."'";
		$result = $db->query($query);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$customer_id = $row['customerid'];
			return $customer_id;
		}
		else{
			return false;
		}
	}

}


?>


