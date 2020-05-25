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
include_once '../objects/amc.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// instantiate product object
$user = new AMC($db);
 
// get posted data
$json = file_get_contents("php://input");
$data = json_decode($json);
// set product property values
$user->amc_id = $data->amc_id;
$user->from_date = $data->from_date;
$user->period = $data->period;
$user->quantity = $data->quantity;
$user->total_services = $data->total_services;
$user->amount = $data->amount;

$billing_name = $data->billing_name;
$amc_type = $data->amc_type;

// create the user
if(
    !empty($user->amc_id) &&
    !empty($user->from_date) &&
    !empty($user->period) &&
    !empty($user->quantity) &&
    !empty($user->total_services) &&
    !empty($user->amount) &&
    !empty($billing_name) &&
    !empty($amc_type) &&
    $user->updateAMC()
){
 
    // set response code
    http_response_code(200);
 
    // display message: user was created
    echo json_encode(array("message" => "AMC updated."));
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to update AMC."));
}

?>