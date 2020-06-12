<?php

    include_once '../objects/complaint.php';

    class ComplaintReport extends Complaint{
        
        //database connection and table name
        private $conn;
        private $table_name = "complaint_report";
        
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
            parent::__construct($db);
            $this->conn = $db;
        }
        
        function createReport() {
            if($this->createComplaint()){
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
                $this->complaint_id = $this->getComplaintid($this->customer_id,$this->amc_id,$this->date,$this->complaint_type_id,$this->conn);
                $query = "INSERT INTO complaint_report(complaintid, defectobserved, actiontaken, partsreplaced, remarks, linevoltage, grilltemp, current, roomtemp, timefrom, timeto, mechanicremarks, mechanicname, customerremarks) ";
                $query .= "VALUES ('".$this->complaint_id."','".$this->defect_observed."','".$this->action_taken."','".$this->parts_replaced."','".$this->remarks."','".$this->line_voltage."','".$this->grill_temp."','".$this->current."','".$this->room_temp."','".$this->time_from."','".$this->time_to."','".$this->mechanic_remarks."','".$this->mechanic_name."','".$this->customer_remarks."')";
                if ($this->conn->query($query) === TRUE) {
                    return true;
                } 
                else {
                    return false;
                } 
            }
            else{
                return false;
            }
        } 
        
        public static function getComplaintReportById($complaint_id,$db){
            $json_output = Complaint::getComplaintById($complaint_id,$db);
            $output = $json_output;

            $query = "SELECT * FROM complaint_report WHERE complaintid='".$complaint_id."'";
            $result = $db->query($query);
            if($result->num_rows>0) {
                $row = $result->fetch_assoc();		
                $output = $output + $row;
            }else{
                return "complaint not found";
            }
            return json_encode($output);          
        }

        function updateComplaintReportById(){
            if($this->updateComplaintById()){
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
                $this->complaint_id = $this->getComplaintid($this->customer_id,$this->amc_id,$this->date,$this->complaint_type_id,$this->conn);
                
                $query = "UPDATE complaint_report SET defectobserved='".$this->defect_observed."',actiontaken='".$this->action_taken."',partsreplaced='".$this->parts_replaced."',remarks='".$this->remarks."',";
                $query .= "linevoltage='".$this->line_voltage."',grilltemp='".$this->grill_temp."',current='".$this->current."',roomtemp='".$this->room_temp."',timefrom='".$this->time_from."',timeto='".$this->time_to."',";
                $query .= "mechanicremarks='".$this->mechanic_remarks."',mechanicname='".$this->mechanic_name."',customerremarks='".$this->customer_remarks."' WHERE complaintid='".$this->complaint_id."'";

                if ($this->conn->query($query) === TRUE) {
                    return true;
                } 
                else {
                    return false;
                }    
            } else{
                return false;
            }
        }

        function deleteComplaintReportById() {
            $this->complaint_id = htmlspecialchars(strip_tags($this->complaint_id));
            $query = "DELETE FROM complaint_report WHERE complaintid = '" . $this->complaint_id . "'";
            if ($this->conn->query($query) === TRUE) {
                if ($this->deleteComplaintById()) {
                    return true;
                } 
                else {
                    return false;
                }
            } 
            else {
                return false;
            }
        }
    }
?>