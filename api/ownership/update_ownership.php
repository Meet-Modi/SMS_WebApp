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
$owner->quantity = $data->quantity;
$product->model_no = $data->model_no;
$product->product_company = $data->product_company;
$product->product_type = $data->product_type;
$product->capacity = $data->capacity;
$product->rating = $data->rating;

$oldproduct_id = $data->oldproduct_id;

$product_data = $product->getProductId();
$p = json_decode($product_data);

if(isset($p->message)){
    echo json_encode(array("error" => "Unable to add product"));

}
else {
    $owner->product_id = $p->productid;
    if(
        !empty($owner->customer_id) &&
        !empty($owner->quantity) &&
        !empty($owner->product_id)
    ){
     
        if($owner->updateOwnership($oldproduct_id)){
            http_response_code(200);
     
            echo json_encode(array("message" => "Product updated in customer."));
        }
        else {
            // set response code
            http_response_code(400);
        
            // display message: unable to create user
            echo json_encode(array("message" => "Ownership already exists, Update the quantity"));    

        }
            
    }
     
    // message if unable to create user
    else{
        // set response code
        http_response_code(400);
     
        // display message: unable to create user
        echo json_encode(array("message" => "Invalid inputs"));
    }
}

?>