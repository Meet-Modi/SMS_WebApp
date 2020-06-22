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
include_once '../objects/employee.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// instantiate product object
$employee = new Employee($db);
 
// get posted data
$json = file_get_contents("php://input");
$data = json_decode($json);

switch($data->operation){
    case "R":
        $json_output = json_encode(Employee::getAllEmployees($db));
        echo($json_output);
    break;

    case "U":
        
    break;
}
