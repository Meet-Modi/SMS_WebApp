<?php

// required headers
header("Access-Control-Allow-Origin: http://localhost/SWS_WebApp/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/amc.php';
include_once '../objects/amc_type.php';
include_once '../objects/complaint.php';
include_once '../objects/complaint_report.php';
include_once '../objects/complaint_type.php';
include_once '../objects/customer.php';
include_once '../objects/employee.php';
include_once '../objects/ownership.php';
include_once '../objects/payment.php';
include_once '../objects/product.php';
include_once '../objects/service.php';
include_once '../objects/mechanic.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

switch($data->view){
    case "Addcustomer":
        $data = array();
        $data['name'] = json_encode(Employee::getEmployeeNamesDropdown($db));
        $data['place'] = json_encode(Customer::getAllPlaceType($db));
        echo json_encode($data);
        break;
    case "Viewcustomer":
        $data = array();
        $data['name'] = json_encode(Employee::getEmployeeNamesDropdown($db));
        $data['place'] = json_encode(Customer::getAllPlaceType($db));
        echo json_encode($data);
        break;
    
    case "BillingName_AMC":
        $data = Customer::getCustomerIDBillingName($db);
        $data = json_encode($data);
        $data = json_decode($data);
        $json_array = array();
        foreach ($data as $row){
            $query = "SELECT amcid FROM amc WHERE customerid = '". $row->customerid."'";
            $result = $db->query($query);
            $output = array();
            if($result->num_rows>0) {
                while($row1 = $result->fetch_assoc()) {
                    $output[] = $row1['amcid'];
                }
            }
            $json_array[$row->billingname] = $output;            
        }
        echo(json_encode($json_array));

      
        break;
    
    case "ViewComplaint":
        $data = array();
        $data['mechanic'] = Mechanic::getAllMechanicName($db);
        $data['complainttype'] = Complaint_type::getAllComplaintTypes($db);
        echo(json_encode($data));
        break;

    case "AddComplaint":
        $data = array();
        $data['mechanic'] = Mechanic::getAllMechanicName($db);
        $data['complainttype'] = Complaint_type::getAllComplaintTypes($db);
        echo(json_encode($data));
        break;
    
    case "ViewAMC":
        $data = array();
        $data['amctype'] = json_encode(amc_type::getAllAmcTypes($db));
        $data['billingname'] = json_encode(Customer::getAllBillingName($db));
        echo json_encode($data);
        break;
}




?>