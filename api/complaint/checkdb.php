<?php
    // required headers
    header("Access-Control-Allow-Origin: http://localhost/SWS_WebApp/");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // database connection will be here
    // files needed to connect to database
    include_once '../config/database.php';
    include_once '../objects/complaint.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    $json = file_get_contents("php://input");
    $data = json_decode($json);
    
    $customer_id = $data->customer_id;
    $amc_id = $data->amc_id;
    $date = $data->date;
    $complaint_type_id = $data->complaint_type_id;
    $cid = Complaint::getComplaintid($customer_id,$amc_id,$date,$complaint_type_id,$db);
    
    echo($cid);


?>