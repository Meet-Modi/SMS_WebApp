<?php

header("Access-Control-Allow-Origin: http://localhost/SWS_WebApp/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/database.php';
include_once '../objects/product.php';
include_once '../objects/ownership.php';
 
$database = new Database();
$db = $database->getConnection();
  
$product = new Product($db);
$ownership = new Ownership($db);

$json = file_get_contents("php://input");
$data = json_decode($json);

switch($data->operation){
    case "C":
        $ownership->customer_id = $data->customer_id;
        $ownership->product_id = $data->product_id;
        $ownership->quantity = $data->quantity;

        if(
            !empty($ownership->customer_id) && !empty($ownership->product_id) &&
            !empty($ownership->quantity) && $ownership->createOwnership()
        ){
         
            http_response_code(200);
            echo json_encode(array("message" => "Product added."));
        }
         
        else{
            http_response_code(400);         
            echo json_encode(array("message" => "Unable to add product"));
        }
    break;
    case "R":
        $ownership->customer_id = $data->customer_id;
        $json_data = $ownership->showProduct();
        echo($json_data);
    break;
    case "U":
        $product->product_id = $data->product_id;
        $product->model_no = $data->model_no;
        $product->product_company = $data->product_company;
        $product->product_type = $data->product_type;
        $product->capacity = $data->capacity;
        $product->rating = $data->rating;
        if(
            !empty($product->product_id) && !empty($product->model_no) && !empty($product->product_company) &&
            !empty($product->product_type) && !empty($product->capacity) && !empty($product->rating) &&
            $product->UpdateProduct()
        ){
            http_response_code(200);
            echo json_encode(array("message" => "Product updateed."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to update product"));
        }
    break;
    case "D":
        $product->product_id = $data->product_id;
        $product->model_no = $data->model_no;
        if(
            (!empty($product->model_no) || !empty($product->product_id)) &&
            $product->deleteProduct()
        ){         
            http_response_code(200);
            echo json_encode(array("message" => "Product deleted."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to delete product"));
        }
    break;
}
?>
