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
include_once '../objects/service.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$service = new Service($db);

switch($data->operation){
    case "C":
        $service->amc_id = $data->amc_id;
        $service->date = $data->date;
        $service->handled_by = $data->handled_by;
        $service->remarks = $data->remarks;
        $service->status = $data->status;
        if(
           !empty($service->amc_id)&& !empty($service->date) && !empty($service->status) &&
           $service->createService()
        ){
            http_response_code(200);
            echo json_encode(array("message" => "service added."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to add service"));
        }
    break;
    case "R":
        switch($data->readmode){
            case "readMonth":
                $month = $data->month;
                $year = $data->year;
                $output_data = Service::getAllServiceByMonth($db,$month,$year);
                echo(json_encode($output_data));        
            break;
            case "readDate":
                $date = $data->date;
                $output_data = Service::getAllServiceByDate($db,$date);
                echo(json_encode($output_data));        
            break;
            case "readId":
                $service_id=$data->service_id;
                $output_data = Service::getServiceById($db,$service_id);
                echo(json_encode($output_data));        
            break;
        }
    break;
    case "U":
        $service->service_id = $data->service_id;
        //$service->amc_id = $data->amc_id;
        $service->date = $data->date;
        $service->handled_by = $data->handled_by;
        $service->remarks = $data->remarks;
        $service->status = $data->status;
        if(
           !empty($service->service_id) && !empty($service->date) && !empty($service->status) &&
           $service->updateServiceById()
        ){
            http_response_code(200);
            echo json_encode(array("message" => "service updated."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to update service"));
        }
       break;
    case "D":
        $service->service_id = $data->service_id;
        
        if(
            !empty($service->service_id) &&
            $service->deleteServiceById()
        ){
            http_response_code(200);
            echo json_encode(array("message" => "Service deleted."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to delete Service"));
        }
    break;
}




?>