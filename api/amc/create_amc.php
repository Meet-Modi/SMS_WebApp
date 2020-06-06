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
include_once '../objects/customer.php';
include_once '../objects/amc.php';
include_once '../objects/amc_type.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$amc = new Amc($db);

$amc->customer_id=Customer::getCustomerIdFromBillingName($data->billing_name,$db);
$amc->amc_type_id=Amc_type::getAmcTypeIdByType($data->amc_type,$db);
$amc->from_date=$data->from_date;
$amc->period=$data->period;
$amc->quantity=$data->quantity;
$amc->total_services=$data->total_services;
$amc->amount=$data->amount;


switch($data->operation){
    case "C":
        if(
            !empty($amc->customer_id) && !empty($amc->amc_type_id) && !empty($amc->from_date) && !empty($amc->period) &&
            !empty($amc->quantity) && !empty($amc->total_services) && !empty($amc->amount) && $amc->createAmc()
        ){
                http_response_code(200);    
                echo json_encode(array("message" => "AMC was added."));
            }
        else{
                http_response_code(400);    
                echo json_encode(array("message" => "AMC unable to add."));
        }
    
    break;

    case "U":
        $amc->amc_id = $data->amc_id;//AMC::getAmcId($amc->customer_id,$amc->amc_type_id,$amc->from_date,$amc->period,$amc->quantity,$amc->total_services,$db);
        if(
            !empty($amc->customer_id) && !empty($amc->amc_type_id) && !empty($amc->from_date) && !empty($amc->period) && 
            !empty($amc->quantity) && !empty($amc->total_services) && !empty($amc->amount) && $amc->updateAmcById()
           ){
                http_response_code(200);    
                echo json_encode(array("message" => "amc was updated."));
            }
        else{
                http_response_code(400);    
                echo json_encode(array("message" => "amc unable to update."));
        }
    break;
}



?>