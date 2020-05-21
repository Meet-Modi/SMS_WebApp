<?php
	ob_start();
	// required headers
	header("Access-Control-Allow-Origin: http://localhost/SMS_WebApp/");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	// files needed to connect to database
	include_once '../config/database.php';
	include_once '../objects/employee.php';
	 
	// get database connection
	$database = new Database();
	$db = $database->getConnection();
	 
	// instantiate product object
	
	$employee = new Employee($db);
	 
	// submitted data will be here 
	// get posted data
	$data = json_decode(file_get_contents("php://input"));
	// set product property values
	$employee->first_name = "meet";
	$employee->last_name = "modi";
	$employee->employee_id = "123";
	$employee->password = "123";
	$employee->admin = 1;
	echo("HELLO");
	
	// create the employee
	if(
	    !empty($employee->firstname) &&
	    !empty($employee->email) &&
	    !empty($employee->password) &&
	    !empty($employee->admin) &&
	    $employee->create()
	){
	 
	    // set response code
	    http_response_code(200);
	 
	    // display message: employee was created
	    echo json_encode(array("message" => "employee was created."));
	}
	 
	// message if unable to create employee
	else{
	 
	    // set response code
	    http_response_code(400);
	 
	    // display message: unable to create employee
	    echo json_encode(array("message" => "Unable to create employee."));
	}
	ob_end_flush();
?>