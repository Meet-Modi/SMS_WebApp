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
include_once '../../config/database.php';
include_once '../../objects/amc_type.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// instantiate product object
$amc_type = new Amc_type($db);
 
// get posted data
$json = file_get_contents("php://input");
$data = json_decode($json);

// create the user
switch($data->operation){
    case "C":
        $amc_type->amc_type = $data->amc_type;
        
        if(
            !empty($amc_type->amc_type) &&
            $amc_type->createAmcType()
        ){
         
            http_response_code(200);         
            echo json_encode(array("message" => "AMC Type added."));
        }
        else{
            http_response_code(400);         
            echo json_encode(array("message" => "Unable to add AMC Type"));
        }
    break;
    case "R":
        $json_data = json_encode(Amc_type::getAllAmcTypes($db));
        echo($json_data);
    break;
    case "U":
        $amc_type->amc_type = $data->amc_type;
        $amc_type->amc_type_id = $data->amc_type_id;
        if(
            !empty($amc_type->amc_type) && !empty($amc_type->amc_type_id) &&
            $amc_type->updateAmcTypeById()  
        ){
            http_response_code(200);
            echo json_encode(array("message" => "AMC Type updated."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to update AMC Type"));
        }
    break;
    case "D":
        $amc_type->amc_type_id = $data->amc_type_id;
        if(
            !empty($amc_type->amc_type_id) &&
            $amc_type->deleteAmcTypeById()  
        ){
            http_response_code(200);
            echo json_encode(array("message" => "AMC Type deleted."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to delete AMC Type"));
        }
    break;
}

?>




