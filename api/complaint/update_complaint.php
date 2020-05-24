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
$user = new Complaint($db);
 
// get posted data
$json = file_get_contents("php://input");
$data = json_decode($json);
// set product property values
$user->complaint_id = $data->complaint_id;
$user->remarks = $data->remarks;
$user->status = $data->status;

$billing_name = $data->billing_name;
$complaint_type = $data->complaint_type;

// create the user
if(
    !empty($user->complaint_id) &&
    !empty($user->remarks) &&
    !empty($user->status) &&
    !empty($billing_name) &&
    !empty($complaint_type) &&
    $user->updateComplain()
){
 
    // set response code
    http_response_code(200);
 
    // display message: user was created
    echo json_encode(array("message" => "Complain update."));
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to update complain."));
}

?>