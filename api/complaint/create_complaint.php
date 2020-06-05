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
$complaint->customer_id = $data->customer_id;
$complaint->amc_id = $data->amc_id;
$complaint->date = $data->date;
$complaint->complaint_type_id = $data->complaint_type_id;;
$complaint->remarks = $data->remarks;

// create the user
if(
    !empty($complaint->customer_id) &&
    !empty($complaint->amc_id) &&
    !empty($complaint->date) &&
    !empty($complaint->complaint_type_id) &&
    !empty($complaint->remarks) &&
    $user->create($billing_name,$complaint_type)
    /*    !empty($complaint->complaint_id) &&
    !empty($complaint->remarks) &&
    !empty($complaint->status) &&
    !empty($billing_name) &&
    !empty($complaint_type) &&
*/    $user->create($billing_name,$complaint_type)
    ){
        
        // set response code
        http_response_code(200);
        
        // display message: user was created
        echo json_encode(array("message" => "Complain Added."));
    }
    
    // message if unable to create user
    else{
        
        // set response code
        http_response_code(400);
        
        // display message: unable to create user
        echo json_encode(array("message" => "Unable to create complain."));
    }
