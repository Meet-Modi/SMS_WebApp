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
include_once '../objects/complaint_report.php';
include_once '../objects/complaint_type.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$complaint = new ComplaintReport($db);


switch($data->operation){
    case "R":
        if(isset($data->R)){
            $output_data = Complaint::getAllComplaints($db);
            echo($output_data); 
        }
        else{
            $complaint_id = $data->complaint_id;
            $json_output_data = $complaint->getComplaintReportById($complaint_id,$db);
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