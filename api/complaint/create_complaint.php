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

// instantiate product object
$complaint = new Complaint($db);

// get posted data
$json = file_get_contents("php://input");
$data = json_decode($json);
// set product property values

//$user->complaint_id = $data->complaint_id;
//$complaint->customer_id = $data->customer_id;
$billing_name = $data->billing_name;
$complaint_type = $data->complaint_type;
$complaint->amc_id = $data->amc_id;
$complaint->date = $data->date;
$complaint->status = $data->status;

// create the user
if(
    !empty($billing_name) &&
    !empty($complaint->amc_id) &&
    !empty($complaint->date) &&
    !empty($complaint->complaint_type) &&
    !empty($complaint->status) &&  
    $complaint->create($billing_name,$complaint_type)
    ){
        
        // set response code
        http_response_code(200);
        
        // display message: user was created
        echo json_encode(array("message" => "Complaint Added."));
    }
    
    // message if unable to create user
    else{
        echo("in outer else");
        // set response code
        http_response_code(400);
        
        // display message: unable to create user
        echo json_encode(array("message" => "Unable to create complaint."));
    }
