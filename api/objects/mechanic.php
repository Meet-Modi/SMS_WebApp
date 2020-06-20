<?php
    class Mechanic{

        private $conn;
        private static $table_name = "mechanic";
        
        public $id;
        public $name;
        public $age;

        public function __construct($db){
            $this->conn = $db;
        }

        function createMechanic(){
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->age=htmlspecialchars(strip_tags($this->age));

            $query = "INSERT INTO mechanic(name, age) VALUES ";
            $query .= "('".$this->name."','".$this->age."')";
            if($this->conn->query($query) === TRUE){
                return true;
            }
            else{
                return false;
            }
        }

        public static function getMechanicById($id,$db){
            $id=htmlspecialchars(strip_tags($id));
            
            $query = "SELECT name, age FROM mechanic WHERE id = '". $id ."'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $mechanic = $row;
                return $mechanic;
            }
            else{
                return false;
            }
        }

        public static function getAllMechanicName($db){
            $query = "SELECT name FROM mechanic";
            $result = $db->query($query);
            $output = array();
            while($row = $result->fetch_assoc()) {			
                $output[] = $row;
            }
            return $output;
        }

        public static function getAllMechanic($db){
            $query = "SELECT * FROM mechanic";
            $result = $db->query($query);
            $output = array();
            while($row = $result->fetch_assoc()) {			
                $output[] = $row;
            }
            return $output;
        }


        function updateMechanicById(){
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->age=htmlspecialchars(strip_tags($this->age));
            
            $query = "UPDATE mechanic SET name='".$this->name."', age'".$this->age."' ";
            $query .= "WHERE id= '".$this->id."'";
            if($this->conn->query($query) === TRUE){
                return true;
            }
            else{
                return false;
            }          
        }

        function deleteMechanicById(){

            $this->id=htmlspecialchars(strip_tags($this->id));
            
            $query = "DELETE FROM mechanic WHERE id = '".$this->id."'";
            if($this->conn->query($query) === TRUE){
                return true;
            }
            else{
                return false;
            }          
        }
    }

?>