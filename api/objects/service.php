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

    

}
?>