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
    include_once '../objects/payment.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // instantiate product object
    $user = new Payment($db);

    // get posted data
    $json = file_get_contents("php://input");
    $data = json_decode($json);
    // set product property values
    $user->invoice_no = $data->invoice_no;
    $user->received_date = $data->received_date;
    $user->status = $data->status;
    $user->amount = $data->amount;

    $billing_name = $data->billing_name;
    $payment_mode = $data->payment_mode;

    // create the user
    if(
        !empty($user->invoice_no) &&
        !empty($user->received_date) &&
        !empty($user->status) &&
        !empty($user->amount) &&
        !empty($billing_name) &&
        !empty($payment_mode) &&
        $user->create($billing_name,$payment_mode)
    ){
    
        // set response code
        http_response_code(200);
    
        // display message: user was created
        echo json_encode(array("message" => "User was created."));
    }
    
    // message if unable to create user
    else{
    
        // set response code
        http_response_code(400);
    
        // display message: unable to create user
        echo json_encode(array("message" => "Unable to create user."));
    }

?>