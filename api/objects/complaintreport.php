<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once '../objects/complaint.php';

    class ComplaintReport extends Complaint{
        
        //database connection and table name
        private $conn;
        private $table_name = "complaintreport";
        
        //object properties
        public $defect_observed;
        public $action_taken;
        public $parts_replaced;
        public $remarks;
        public $line_voltage;
        public $grill_temp;
        public $current;
        public $room_temp;
        public $time_from;
        public $time_to;
        public $mechanic_remarks;
        public $mechanic_name;
        public $customer_remarks;

        public function __construct($db){
            $this->conn = $db;
        }
        
        function createReport() {
 
            $this->defect_observed=htmlspecialchars(strip_tags($this->defect_observed));
            $this->action_taken=htmlspecialchars(strip_tags($this->action_taken));
            $this->parts_replaced=htmlspecialchars(strip_tags($this->parts_replaced));
            $this->remarks=htmlspecialchars(strip_tags($this->remarks));
            $this->line_voltage=htmlspecialchars(strip_tags($this->line_voltage));
            $this->grill_temp=htmlspecialchars(strip_tags($this->grill_temp));
            $this->current=htmlspecialchars(strip_tags($this->current));
            $this->room_temp=htmlspecialchars(strip_tags($this->room_temp));
            $this->time_from=htmlspecialchars(strip_tags($this->time_from));
            $this->time_to=htmlspecialchars(strip_tags($this->time_to));
            $this->mechanic_remarks=htmlspecialchars(strip_tags($this->mechanic_remarks));
            $this->mechanic_name=htmlspecialchars(strip_tags($this->mechanic_name));
            $this->customer_remarks=htmlspecialchars(strip_tags($this->customer_remarks));
            $this->complaint_id=htmlspecialchars(strip_tags($complaint_id));

        }

?>