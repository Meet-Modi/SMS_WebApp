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
include_once '../objects/mechanic.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// instantiate product object
$mechanic = new Mechanic($db);
 
// get posted data
$json = file_get_contents("php://input");
$data = json_decode($json);

// create the user
switch($data->operation){
    case "C":
        $mechanic->name = $data->name;
        $mechanic->age = $data->age;
        if(
            !empty($mechanic->name) && !empty($mechanic->age) &&
            $mechanic->createMechanic()
        ){
         
            http_response_code(200);         
            echo json_encode(array("message" => "Mechanic added."));
        }
        else{
            http_response_code(400);         
            echo json_encode(array("message" => "Unable to add Mechanic"));
        }
    break;
    case "R":
        $json_data = json_encode($mechanic->getAllMechanic($db));
        echo($json_data);
    break;
    case "U":
        $mechanic->id=$data->mechanicid;
        $mechanic->name = $data->name;
        $mechanic->age = $data->age;
        if(
            !empty($mechanic->name) && !empty($mechanic->age) &&
            !empty($mechanic->id) && $mechanic->updateMechanicById()
        ){
            http_response_code(200);
            echo json_encode(array("message" => "Mechanic updateed."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to update Mechanic"));
        }
    break;
    case "D":
        $mechanic->id=$data->mechanicid;
        if(
            !empty($mechanic->id) && $mechanic->deleteMechanicById()
        ){         
            http_response_code(200);
            echo json_encode(array("message" => "Mechanic deleted."));
        }
        else{
            http_response_code(400);
            echo json_encode(array("message" => "Unable to delete Mechanic"));
        }
    break;
}

?>




