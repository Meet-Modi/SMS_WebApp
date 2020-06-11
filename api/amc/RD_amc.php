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
include_once '../objects/amc.php';
include_once '../objects/amc_type.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$amc = new AMC($db);


switch($data->operation){
    case "R":
        if(isset($data->R)){
            $output_data = AMC::getAllAmc($db);
            echo($output_data);
        }
        else{
            $amc_id = $data->amc_id;
            $json_output_data = AMC::getAmcById($amc_id,$db);
            echo($json_output_data);
        }
    break;
    case "D":
        $complaint->complaint_id = $data->complaint_id;
        if(
            !empty($complaint->complaint_id) &&
            $complaint->deleteComplaintReportById()
        ){
            http_response_code(200);
            echo json_encode(array("message" => "complaint type deleted."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to delete complaint type"));
        }
    break;
}
?>