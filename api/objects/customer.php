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

		//$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
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
//		echo("*1st query executed");

		if ($result1->num_rows > 0) {
			$row = $result1->fetch_assoc();
			$this->user_id = $row['userid'];
//			echo("echo in if 1");

			$query2 = "SELECT placeid FROM place WHERE placetype = '" . $place_type ."'";
			// prepare the query
			$result2 = $this->conn->query($query2);
			if ($result2->num_rows > 0) {
//				echo("in if 2");
				$row = $result2->fetch_assoc();
				$this->place_id = $row['placeid'];
				$query3 = "INSERT INTO ". $this->table_name ;
				$query3 .= "(userid, billingname, placeid, firstname, lastname, contactno1, contactno2, address, city, state, pincode, email) VALUES";
				$query3 .= "('".$this->user_id."','".$this->billing_name."','".$this->place_id."',";
				$query3 .= "'".$this->contact_fname."','".$this->contact_lname."','".$this->contact_no1."','".$this->contact_no2."',";
				$query3 .= "'".$this->address."','".$this->city."','".$this->state."','".$this->pincode."','".$this->email."');";

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

	function showCustomer() {
		$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
		$query1 = "SELECT * FROM ". $this->table_name ." WHERE customerid = '". $this->customer_id ."'";
		// prepare the query
		$result1 = $this->conn->query($query1);

		if($result1->num_rows>0) {
			$row = $result1->fetch_assoc();		
			$json_output = $row;
		}else{
			return "customer not found";
		}

		return json_encode($json_output);
	}

	function showAllCustomer() {
		$query1 = "SELECT * FROM ". $this->table_name;
		// prepare the query
		$result1 = $this->conn->query($query1);

		$json_output = array();

		while($row = $result1->fetch_assoc()) {			
			$json_output[] = $row;
		}

		return json_encode($json_output);
	}

	function updateCustomer() {

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

		$query = "UPDATE ". $this->table_name ;
		$query .= " SET billingname = '". $this->billing_name ."', firstname = '". $this->contact_fname ."', lastname = '". $this->contact_lname ."',";
		$query .= " contactno1 = '". $this->contact_no1 ."', contactno2 = '". $this->contact_no2 ."', address = '". $this->address ."',";
		$query .= " city = '". $this->city ."', state = '". $this->state ."', pincode = '". $this->pincode ."', email = '". $this->email ."'";
		$query .= " WHERE customerid = '". $this->customer_id ."'";
		
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