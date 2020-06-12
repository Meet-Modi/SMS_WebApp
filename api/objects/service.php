<?php

class Service{

    private $conn;
    private $table_name = "service";

    //object properties
    public $service_id;
    public $amc_id;
    public $date;
    public $handled_by;
    public $remarks;
    public $status;

    public function __construct($db){
        $this->conn = $db;
    }

    function createService(){
        $this->amc_id=htmlspecialchars(strip_tags($this->amc_id));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->handled_by=htmlspecialchars(strip_tags($this->handled_by));
        $this->remarks=htmlspecialchars(strip_tags($this->remarks));
        $this->status=htmlspecialchars(strip_tags($this->status));        

        $query = "INSERT INTO ".$this->table_name." (amcid, date, handledby, remarks, status) VALUES ";
        $query .= "('".$this->amc_id."','".$this->date."','".$this->handled_by."','".$this->remarks."','".$this->status."')";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } 
        else {
            return false;
        }
    }

    function updateServiceById(){
        
        $this->service_id=htmlspecialchars(strip_tags($this->service_id));
        $this->amc_id=htmlspecialchars(strip_tags($this->amc_id));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->handled_by=htmlspecialchars(strip_tags($this->handled_by));
        $this->remarks=htmlspecialchars(strip_tags($this->remarks));
        $this->status=htmlspecialchars(strip_tags($this->status));        

        $query = "UPDATE ".$this->table_name." SET amcid='".$this->amc_id."',date='".$this->date."',handledby='".$this->handled_by."',remarks='".$this->remarks."',status='".$this->status."'";
        $query .= " WHERE serviceid = '".$this->service_id."'";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } 
        else {
            return false;
        }
    }
    function deleteServiceById(){
        $this->service_id=htmlspecialchars(strip_tags($this->service_id)); 
        $this->amc_id=htmlspecialchars(strip_tags($this->amc_id));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->handled_by=htmlspecialchars(strip_tags($this->handled_by));
        $this->remarks=htmlspecialchars(strip_tags($this->remarks));
        $this->status=htmlspecialchars(strip_tags($this->status));        

        $query = "DELETE FROM ".$this->table_name." WHERE serviceid='".$this->service_id."'";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } 
        else {
            return false;
        }
    }
    public static function getAllServiceByDate($db,$date){
        $date=htmlspecialchars(strip_tags($date));
        $query = "SELECT * FROM service WHERE date = '".$date."'";
        $result = $db->query($query);
		$output = array();
		while($row = $result->fetch_assoc()) {			
			$output[] = $row;
		}
		return $output;
    }
    
}
?>