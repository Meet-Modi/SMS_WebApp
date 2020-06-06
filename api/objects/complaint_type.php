<?php
    class Complaint_type{

        private $conn;
        private static $table_name = "complaint_type";
    
        public $complaint_type_id;
        public $complaint_type;

        public function __construct($db){
            $this->conn = $db;
        }

        function createComplaintType(){
            $this->complaint_type=htmlspecialchars(strip_tags($this->complaint_type));
            $this->complaint_type_id=htmlspecialchars(strip_tags($this->complaint_type_id));

            $query = "INSERT INTO complaint_type(complainttypeid, complainttype) VALUES ";
            $query .= "('".$this->complaint_type."','".$this->complaint_type_id."')";
            if($this->conn->query($query) === TRUE){
                return true;
            }
            else{
                return false;
            }
        }

        public static function getAllComplaintTypes($db){
            $query = "SELECT complainttype FROM complaint_type";
            $result = $db->query($query);
            $output = array();
            while($row = $result->fetch_assoc()) {			
                $output[] = $row;
            }
            return $output;
        }

        public static function getComplaintTypeIdByType($complaint_type,$db){
            $complaint_type=htmlspecialchars(strip_tags($complaint_type));

            $query = "SELECT complainttypeid FROM complaint_type WHERE complainttype = '". $complaint_type ."'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $complaint_type_id = $row['complainttypeid'];
                return $complaint_type_id;
            }
            else{
                return false;
            }
        }
    
        public static function getComplaintTypeById($complaint_type_id,$db){
            
            $complaint_type_id=htmlspecialchars(strip_tags($complaint_type_id));
            
            $query = "SELECT complainttype FROM ".$this->table_name." WHERE complainttypeid = '". $complaint_type_id ."'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $complaint_type = $row['complainttype'];
                return $complaint_type;
            }
            else{
                return false;
            }
        }

        function updateComplaintTypeById(){
            $this->complaint_type=htmlspecialchars(strip_tags($this->complaint_type));
            $this->complaint_type_id=htmlspecialchars(strip_tags($this->complaint_type_id));
            
            $query = "UPDATE complaint_type SET complainttype='".$this->complaint_type."' ";
            $query .= "WHERE complainttypeid= '".$this->complaint_type_id."'";
            if($this->conn->query($query) === TRUE){
                return true;
            }
            else{
                return false;
            }          
        }

        function deleteComplaintTypeById(){

            $this->complaint_type_id=htmlspecialchars(strip_tags($this->complaint_type_id));
            
            $query = "DELETE FROM complaint_type WHERE complainttypeid = '".$this->complaint_type_id."'";
            if($this->conn->query($query) === TRUE){
                return true;
            }
            else{
                return false;
            }          
        }
    }

?>