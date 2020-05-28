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
include_once '../objects/product.php';
include_once '../objects/ownership.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// instantiate product object
$product = new Product($db);
$owner = new Ownership($db);
 
// get posted data
$json = file_get_contents("php://input");
$data = json_decode($json);
// set product property values
//$user->customer_id = $data->customer_id;
$owner->customer_id = $data->customer_id;

// create the user
$json_data = $owner->showProduct();
echo($json_data);

?>