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
include_once '../objects/payment.php';

 
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// instantiate product object
$user = new Payment($db);
// get posted data
$json = file_get_contents("php://input");
$data = json_decode($json);
// set product property values
/*$user->customer_id = $data->customer_id;
$user->billing_name = $data->billing_name;
$user->contact_fname = $data->contact_fname;
$user->contact_lname = $data->contact_lname;
$user->contact_no1 = $data->contact_no1;
$user->contact_no2 = $data->contact_no2;
$user->address = $data->address;
$user->city = $data->city;
$user->state = $data->state;
$user->pincode = $data->pincode;
$user->email = $data->email;

$user_fname = $data->user_fname;
$user_lname = $data->user_lname;
$place = $data->place_type;

// create the user
if(
    !empty($user->billing_name) &&
    !empty($user->contact_fname) &&
    !empty($user->contact_lname) &&
    !empty($user->contact_no1) &&
    !empty($user->contact_no2) &&
    $user->create($user_fname,$user_lname,$place)
){
 
    // set response code
    http_response_code(200);
 
    // display message: user was created
    echo json_encode(array("message" => "User was created."));
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to create user."));
}*/

//if($data->option==1) {
    $billing_name = $data->billing_name;
    $json_data = $user->showPayment($billing_name);
    echo($json_data);

    $json_data1 = $user->showAllPayment();
    echo($json_data1);
/*}
else{
    $json_data = $user->showAllCustomer();
    echo($json_data);
}*/

?>