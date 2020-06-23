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
        $ownership->customer_id = $data->customer_id;
        $ownership->product_id = $data->product_id;
        $ownership->quantity = $data->quantity;

        if(
            !empty($ownership->customer_id) && !empty($ownership->product_id) &&
            !empty($ownership->quantity) && $ownership->UpdateOwnership()
        ){
            http_response_code(200);
            echo json_encode(array("message" => "Ownership updated."));
        }
         
        else{
            http_response_code(400);         
            echo json_encode(array("message" => "Unable to update ownership"));
        }
    break;
    case "D":
        $ownership->customer_id = $data->customer_id;
        $ownership->product_id = $data->product_id;
        if(
            !empty($ownership->customer_id) && !empty($ownership->product_id) &&
            $ownership->deleteOwnership()
        ){         
            http_response_code(200);
            echo json_encode(array("message" => "Ownership deleted."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to delete Ownership"));
        }
    break;
}
?>
