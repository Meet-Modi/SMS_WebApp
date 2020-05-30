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
 
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// instantiate product object
$product = new Product($db);
 
// get posted data
//$json = file_get_contents("php://input");
//$data = json_decode($json);
// set product property values
//$user->customer_id = $data->customer_id;

// create the user
$json_data = $product->showAllProduct();
echo($json_data);

?>