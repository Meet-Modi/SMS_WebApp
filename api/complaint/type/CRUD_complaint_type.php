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
include_once '../objects/complaint_type.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$complaint_type = new Complaint_type();

$complaint_type->complaint_type_id = $data->complaint_type_id;
$complaint_type->complaint_type = $data->complaint_type;

switch($data->operation){
    case "C":
        if(
           !empty($complaint_type->complaint_type) && !empty($complaint_type->complaint_type_id) &&
            $complaint_type->createComplaintType();
        ){
            http_response_code(200);
            echo json_encode(array("message" => "complaint type added."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to add complaint_type"));
        }
    break;
    case "R":
        $output_data = Complaint_type::getAllComplaintTypes();
        echo(json_encode($output_data);
    break;
    case "U":
        if(
            !empty($complaint_type->complaint_type) && !empty($complaint_type->complaint_type_id) &&
            $complaint_type->updateComplaintTypeById();
        ){
            http_response_code(200);
            echo json_encode(array("message" => "complaint type updated."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to update complaint type"));
        }
    break;
    case "D":
        if(
            !empty($complaint_type->complaint_type) && !empty($complaint_type->complaint_type_id) &&
            $complaint_type->deleteComplaintTypeById();
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