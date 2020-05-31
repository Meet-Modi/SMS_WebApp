<?php

//error_reporting(E_ERROR | E_WARNING | E_PARSE);

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
$json = file_get_contents("php://input");
$data = json_decode($json);

// set product property values
$product->model_no = $data->model_no;
$product->product_company = $data->product_company;
$product->product_type = $data->product_type;
$product->capacity = $data->capacity;
$product->rating = $data->rating;

// create the user
switch($data->operation){
    case "C":
        if(
            !empty($product->model_no) && !empty($product->product_company) &&
            !empty($product->product_type) && !empty($product->capacity) && !empty($product->rating) &&
            $product->addProduct()
        ){
         
            // set response code
            http_response_code(200);
         
            // display message: user was created
            echo json_encode(
                array(
                    "message" => "Product added."
                )
            );
        }
         
        // message if unable to create user
        else{
         
            // set response code
            http_response_code(400);
         
            // display message: unable to create user
            echo json_encode(array("message" => "Unable to add product"));
        }
    break;
    case "R":
        $json_data = $product->showAllProduct();
        echo($json_data);
    break;
    case "U":
        if(
            !empty($product->model_no) && !empty($product->product_company) &&
            !empty($product->product_type) && !empty($product->capacity) && !empty($product->rating) &&
            $product->UpdateProduct()
        ){
         
            // set response code
            http_response_code(200);
         
            // display message: user was created
            echo json_encode(
                array(
                    "message" => "Product updateed."
                )
            );
        }
         
        // message if unable to create user
        else{
         
            // set response code
            http_response_code(400);
         
            // display message: unable to create user
            echo json_encode(array("message" => "Unable to update product"));
        }
    break;
    case "D":
        if(
            (!empty($product->model_no) || !empty($product->product_id)) &&
            $product->deleteProduct()
        ){
         
            // set response code
            http_response_code(200);
         
            // display message: user was created
            echo json_encode(
                array(
                    "message" => "Product deleted."
                )
            );
        }
         
        // message if unable to create user
        else{
         
            // set response code
            http_response_code(400);
         
            // display message: unable to create user
            echo json_encode(array("message" => "Unable to delete product"));
        }
    break;
}

?>




