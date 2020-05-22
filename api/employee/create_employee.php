<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/SWS_WepApp/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// database connection will be here
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/employee.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$user = new Employee($db);
 
// get posted data
$json = file_get_contents("php://input");
$data = json_decode($json);

// set product property values
$user->userid = $data->userid;
$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->password = $data->password;
$user->admin = $data->admin;

// create the user
if(
    !empty($user->firstname) &&
    !empty($user->userid) &&
    !empty($user->password) &&
    !empty($user->admin) &&
    $user->create()
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
}

?>