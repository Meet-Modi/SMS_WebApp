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

$complaint->customer_id = Customer::getCustomerIdFromBillingName($data->billing_name,$db);
$complaint->amc_id = $data->amc_id;
$complaint->date = $data->date;
$complaint->complaint_type_id = Complaint_type::getComplaintTypeIdByType($data->complaint_type,$db);
$complaint->status = $data->status;
$complaint->defect_observed=$data->defect_observed;
$complaint->action_taken=$data->action_taken;
$complaint->parts_replaced=$data->parts_replaced;
$complaint->remarks=$data->remarks;
$complaint->line_voltage=$data->line_voltage;
$complaint->grill_temp=$data->grill_temp;
$complaint->current=$data->current;
$complaint->room_temp=$data->room_temp;
$complaint->time_from=$data->time_from;
$complaint->time_to=$data->time_to;
$complaint->mechanic_remarks=$data->mechanic_remarks;
$complaint->mechanic_name=$data->mechanic_name;
$complaint->customer_remarks=$data->customer_remarks;

switch($data->operation){
    case "C":
        if(
            !empty($complaint->customer_id) &&
            !empty($complaint->amc_id) &&
            !empty($complaint->date) &&
            !empty($complaint->complaint_type_id) &&
            !empty($complaint->status) &&
            $complaint->createReport()
           ){
                http_response_code(200);    
                echo json_encode(array("message" => "Complaint was added."));
            }
        else{
                http_response_code(400);    
                echo json_encode(array("message" => "Complaint unable to add."));
        }
    break;

    case "U":
        $complaint->complaint_id = $data->complaint_id;//Complaint::getComplaintid($complaint->customer_id,$complaint->amc_id,$complaint->date,$complaint->complaint_type_id,$db);
        if(
            !empty($complaint->customer_id) && !empty($complaint->amc_id) && !empty($complaint->date) &&
            !empty($complaint->complaint_type_id) && !empty($complaint->status) &&
            $complaint->updateComplaintReportById()
           ){
                http_response_code(200);    
                echo json_encode(array("message" => "Complaint was updated."));
            }
        else{
                http_response_code(400);    
                echo json_encode(array("message" => "Complaint unable to update."));
        }
    break;
}




?>