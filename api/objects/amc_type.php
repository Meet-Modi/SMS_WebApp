<?php
    class Amc_type{

        private $conn;
        private static $table_name = "amc_type";
    
        public $amc_type_id;
        public $amc_type;

        public function __construct($db){
            $this->conn = $db;
        }

        function AmcType(){
            $this->amc_type=htmlspecialchars(strip_tags($this->amc_type));
            $this->amc_type_id=htmlspecialchars(strip_tags($this->amc_type_id));

            $query = "INSERT INTO amc_type(amctypeid, amctype) VALUES ";
            $query .= "('".$this->amc_type."','".$this->amc_type_id."')";
            if($this->conn->query($query) === TRUE){
                return true;
            }
            else{
                return false;
            }
        }

        public static function getAllAmcTypes($db){
            $query = "SELECT amctype FROM amc_type";
            $result = $db->query($query);
            $output = array();
            while($row = $result->fetch_assoc()) {			
                $output[] = $row;
            }
            return $output;
        }

        public static function getAmcTypeIdByType($amc_type,$db){
            $amc_type=htmlspecialchars(strip_tags($amc_type));

            $query = "SELECT amctypeid FROM amc_type WHERE amctype = '". $amc_type ."'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $amc_type_id = $row['amctypeid'];
                return $amc_type_id;
            }
            else{
                return false;
            }
        }
    
        public static function getAmcTypeById($amc_type_id,$db){
            
            $amc_type_id=htmlspecialchars(strip_tags($amc_type_id));
            
            $query = "SELECT amctype FROM ".$this->table_name." WHERE amctypeid = '". $amc_type_id ."'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $amc_type = $row['amctype'];
                return $amc_type;
            }
            else{
                return false;
            }
        }

        function updateAmcTypeById(){
            $this->amc_type=htmlspecialchars(strip_tags($this->amc_type));
            $this->amc_type_id=htmlspecialchars(strip_tags($this->amc_type_id));
            
            $query = "UPDATE amc_type SET amctype='".$this->amc_type."' ";
            $query .= "WHERE amctypeid= '".$this->amc_type_id."'";
            if($this->conn->query($query) === TRUE){
                return true;
            }
            else{
                return false;
            }          
        }

        function deleteAmcTypeById(){

            $this->amc_type_id=htmlspecialchars(strip_tags($this->amc_type_id));
            
            $query = "DELETE FROM amc_type WHERE amctypeid = '".$this->amc_type_id."'";
            if($this->conn->query($query) === TRUE){
                return true;
            }
            else{
                return false;
            }          
        }
    }

?>