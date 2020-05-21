<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "sms";
    private $username = "root";
    private $password = "MeetModi08)(";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        
        return $this->conn;
    }
}
?>