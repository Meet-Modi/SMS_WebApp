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

$owner->customer_id = $data->customer_id;
$product->model_no = $data->model_no;
$product->product_company = $data->product_company;
$product->product_type = $data->product_type;
$product->capacity = $data->capacity;
$product->rating = $data->rating;

$product_data = $product->getProductId();
$p = json_decode($product_data);

if(isset($p->message)){
    echo json_encode(array("error" => "product was not found/is already deleted"));
}
else {
    $owner->product_id = $p->productid;
    echo($owner->customer_id);
    echo($owner->product_id);
    if(
        !empty($owner->customer_id) &&
        !empty($owner->product_id)
    ){     
        if($owner->deleteOwnership()){
            http_response_code(200);
     
            echo json_encode(array("message" => "Ownership deleted."));
        }
        else {
            // set response code
            http_response_code(400);

            // display message: unable to create user
            echo json_encode(array("message" => "Unable to delete Ownership"));    
        }            
    }
    else{
        // set response code
        http_response_code(400);
     
        // display message: unable to create user
        echo json_encode(array("message" => "Invalid inputs"));
    }
}

?>