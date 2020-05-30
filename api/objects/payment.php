<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Payment{

	//database connection and table name
	private $conn;
	private $table_name = "payment";

    //object properties
    public $payment_id;
	public $customer_id;
	public $invoice_no;
	public $payment_mode_id;
	public $received_date;
	public $status;
	public $amount;
	
	public function __construct($db){
    	$this->conn = $db;
    }

    function create($billing_name, $payment_mode){
        //$this->payment_id=htmlspecialchars(strip_tags($this->payment_id));
        //$this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
        $this->invoice_no=htmlspecialchars(strip_tags($this->invoice_no));
        //$this->payment_mode_id=htmlspecialchars(strip_tags($this->payment_mode_id));
        $this->received_date=htmlspecialchars(strip_tags($this->received_date));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->amount=htmlspecialchars(strip_tags($this->amount));

        $billing_name=htmlspecialchars(strip_tags($billing_name));
        $payment_mode=htmlspecialchars(strip_tags($payment_mode));

        $query1 = "SELECT customerid FROM customer WHERE billingname = '" . $billing_name . "'";
		// prepare the query
		$result1 = $this->conn->query($query1);
//		echo("*1st query executed");

		if ($result1->num_rows > 0) {
			$row = $result1->fetch_assoc();
			$this->customer_id = $row['customerid'];
//			echo("echo in if 1");

			$query2 = "SELECT paymentmodeid FROM payment_mode WHERE paymentmode = '" . $payment_mode ."'";
			// prepare the query
			$result2 = $this->conn->query($query2);
			if ($result2->num_rows > 0) {
//				echo("in if 2");
				$row = $result2->fetch_assoc();
				$this->payment_mode_id = $row['paymentmodeid'];
				$query3 = "INSERT INTO ". $this->table_name ;
				$query3 .= "(customerid, invoiceno, paymentmodeid, receiveddate, status, amount) VALUES";
				$query3 .= "('".$this->customer_id."','".$this->invoice_no."','".$this->payment_mode_id."',";
				$query3 .= "'".$this->received_date."','".$this->status."','".$this->amount."');";

				if ($this->conn->query($query3) === TRUE) {
					//echo("3rd query executed");
					return true;
				} else {
                    //echo "Error: " . $query2 . "<br>" . $this->conn->error;
					return false;
				} 
			} else {
                echo "payment mode not found";
                return false;
            }	
		} else {
            echo "Customer not exist";
			return false;
		}
    }
    
    function showPayment($billing_name){
        $billing_name=htmlspecialchars(strip_tags($billing_name));

        $query1 = "SELECT customerid, firstname, lastname, contactno1, contactno2  FROM customer WHERE billingname = '" . $billing_name . "'";
		// prepare the query
		$result1 = $this->conn->query($query1);
//		echo("*1st query executed");
        $json_output = array();
		if ($result1->num_rows > 0) {
			$row1 = $result1->fetch_assoc();
			$this->customer_id = $row1['customerid'];
//			echo("echo in if 1");

			$query2 = "SELECT * FROM " . $this->table_name . " WHERE customerid = '" . $this->customer_id ."'";
			// prepare the query
			$result2 = $this->conn->query($query2);
			if ($result2->num_rows > 0) {
//				echo("in if 2");
                while($row2 = $result2->fetch_assoc()) {
					$json_output[] = $row1 + $row2;
				}
				return json_encode($json_output);
			} else {
                echo "payment mode not found";
                return false;
            }	
		} else {
            echo "Customer not exist";
			return false;
		}
	}
	
	function showAllPayment() {

        $query1 = "SELECT customerid, billingname, firstname, lastname, contactno1, contactno2  FROM customer";
		// prepare the query
		$result1 = $this->conn->query($query1);
//		echo("*1st query executed");
        $json_output = array();
		if ($result1->num_rows > 0) {
			while($row1 = $result1->fetch_assoc()) {
				$this->customer_id = $row1['customerid'];
		//			echo("echo in if 1");

				$query2 = "SELECT * FROM " . $this->table_name . " WHERE customerid = '" . $this->customer_id ."'";
				// prepare the query
				$result2 = $this->conn->query($query2);
				if ($result2->num_rows > 0) {
		//				echo("in if 2");
					while($row2 = $result2->fetch_assoc()) {
						$json_output[] = $row1 + $row2;
					}
				} else {
					echo "payment mode not found";
					return false;
				}
			}
			return json_encode($json_output);
		} else {
            echo "Customer not exist";
			return false;
		}	
	}

}