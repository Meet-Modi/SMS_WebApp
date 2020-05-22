<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "sms";
    private $username = "root";
    private $password = "jinesh@0303";
    public $conn;
  
     // get the database connection
    public function getConnection(){
 
        $this->conn = null;
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) 
        {
            die("Connection failed: " . $this->conn->connect_error);
        }
        /*if (!defined('PDO::ATTR_DRIVER_NAME')) {
            echo 'PDO is unavailable<br/>';
        }
        elseif (defined('PDO::ATTR_DRIVER_NAME')) {
            echo 'PDO is available<br/>';
        }

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            echo("connection established");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        */

        return $this->conn;
    }    
}
?>