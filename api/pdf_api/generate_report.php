<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/SWS_WebApp/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'fpdf182/fpdf.php';
include_once '../config/database.php';
include_once '../objects/customer.php';
include_once '../objects/amc.php';
include_once '../objects/complaint_report.php';
include_once '../objects/complaint_type.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$complaint = new ComplaintReport($db);
$customer = new Customer($db);

$json = file_get_contents("php://input");
$data = json_decode($json);

$complaint->complaint_id=$_POST['complaint_id'];
$complaint->customer_id = Customer::getCustomerIdFromBillingName($_POST['billing_name'],$db);
$customer->customer_id = $complaint->complaint_id;

$json_customer=$customer->showCustomer();
$data_customer = json_decode($json_customer);

$complaint->amc_id = $_POST['amc_id'];
$json_amc = AMC::getAmcById($_POST['amc_id'],$db);
$data_amc = json_decode($json_amc);

$pdf = new FPDF('L','mm','A4');
$pdf->SetFont('Times','',11);
$pdf->AddPage();
$pdf->Image('img/logo.jpeg',10,10,10,10,'JPEG');
$pdf->Image('img/header.jpg',34,10,80,20,'JPG');
$pdf->Image('img/logo.jpeg',158,10,10,10,'JPEG');
$pdf->Image('img/header.jpg',182,10,80,20,'JPG');
$pdf->SetXY(20,40);
$pdf->Multicell(120,3,"\nComplaint ID: ".$_POST['complaint_id']."                                             Date: ".$_POST['date']."\n",1,'L'); 
$pdf->SetXY(20,46);
$pdf->Multicell(120,3,"\nAMC From : ".$data_amc->fromdate."                   AMC TO: \n",1,'L'); 
$pdf->SetXY(20,52);
$pdf->Multicell(120,4,"\nName of Customer: ".$data_customer->billingname."     \nContact Person: ".$data_customer->firstname." ".$data_customer->lastname."\n",1,'L'); 
$pdf->SetXY(20,64);
$pdf->Multicell(120,4,"\nAddress: " . $data_customer->address . " ",1,'L'); 
$pdf->SetXY(20,76);
$pdf->Multicell(120,4,"Mobile : ".$data_customer->contactno1."                      Telephone : 079-12345678\n",1,'L'); 
$pdf->SetXY(20,80);
$pdf->Multicell(120,4,"\nNature of Complaint : ".$_POST['complaint_type']."\n",1,'L'); 
$pdf->SetXY(20,88);


$pdf->Multicell(120,4,"\nRemarks : ".$_POST['remarks']."\n",1,'L'); 
$pdf->SetXY(20,96);
$pdf->Multicell(120,4,"\nCall Assigned to : ".$_POST['mechanic_name']."\n",1,'L'); 
$pdf->SetXY(20,104);
$pdf->Multicell(120,4,"\nDefect Observed : ".$_POST['defect_observed']."\n",1,'L'); 
$pdf->SetXY(20,112);
$pdf->Multicell(120,4,"\nAction Taken : ".$_POST['action_taken']."\n",1,'L'); 
$pdf->SetXY(20,120);
$pdf->Multicell(120,4,"\nParts Replaced : ".$_POST['parts_replaced']."\n",1,'L'); 
$pdf->SetXY(20,128);
$pdf->Multicell(120,4,"\nRemarks : \n",1,'L'); 
$pdf->SetXY(20,136);
$pdf->Cell(60,4,"\nLine Voltages : ".$_POST['line_voltage']."\n",1); 
$pdf->Cell(60,4,"\nGrill Temp : ".$_POST['grill_temp']."\n",1); 
$pdf->SetXY(20,140);
$pdf->Cell(60,4,"\nCurrent : ".$_POST['current']."\n",1); 
$pdf->Cell(60,4,"\nRoom Temp : ".$_POST['room_temp']."\n",1); 
$pdf->SetXY(20,144);
$pdf->Multicell(120,4,"\nTime Worked : From ".$_POST['time_from']."to                   Date : ".$_POST['time_to']."\n",1,'L'); 
$pdf->SetXY(20,152);
$pdf->Multicell(120,4,"\nMechanic Remarks : ".$_POST['mechanic_remarks']."\n",1,'L'); 
$pdf->SetXY(20,160);
$pdf->Multicell(120,4,"\nName & sign of Mechanic : \n\n",1,'L'); 
$pdf->SetXY(20,168);
$pdf->Multicell(120,4,"\nCustomer's Remarks : ".$_POST['customer_remarks']."\n\n",1,'L'); 

$pdf->SetXY(158,40);
$pdf->Multicell(120,3,"\nComplaint ID: ".$_POST['complaint_id']."                                             Date: ".$_POST['date']."\n",1,'L'); 
$pdf->SetXY(158,46);
$pdf->Multicell(120,3,"\nAMC From : ".$data_amc->fromdate."                   AMC TO: \n",1,'L'); 
$pdf->SetXY(158,52);
$pdf->Multicell(120,4,"\nName of Customer: ".$data_customer->billingname."     \nContact Person: ".$data_customer->firstname." ".$data_customer->lastname."\n",1,'L'); 
$pdf->SetXY(158,64);
$pdf->Multicell(120,4,"\nAddress: " . $data_customer->address . " ",1,'L'); 
$pdf->SetXY(158,76);
$pdf->Multicell(120,4,"Mobile : ".$data_customer->contactno1."                      Telephone : 079-12345678\n",1,'L'); 
$pdf->SetXY(158,80);
$pdf->Multicell(120,4,"\nNature of Complaint : ".$_POST['complaint_type']."\n",1,'L'); 
$pdf->SetXY(158,88);


$pdf->Multicell(120,4,"\nRemarks : ".$_POST['remarks']."\n",1,'L'); 
$pdf->SetXY(158,96);
$pdf->Multicell(120,4,"\nCall Assigned to : ".$_POST['mechanic_name']."\n",1,'L'); 
$pdf->SetXY(158,104);
$pdf->Multicell(120,4,"\nDefect Observed : ".$_POST['defect_observed']."\n",1,'L'); 
$pdf->SetXY(158,112);
$pdf->Multicell(120,4,"\nAction Taken : ".$_POST['action_taken']."\n",1,'L'); 
$pdf->SetXY(158,120);
$pdf->Multicell(120,4,"\nParts Replaced : ".$_POST['parts_replaced']."\n",1,'L'); 
$pdf->SetXY(158,128);
$pdf->Multicell(120,4,"\nRemarks : \n",1,'L'); 
$pdf->SetXY(158,136);
$pdf->Cell(60,4,"\nLine Voltages : ".$_POST['line_voltage']."\n",1); 
$pdf->Cell(60,4,"\nGrill Temp : ".$_POST['grill_temp']."\n",1); 
$pdf->SetXY(158,140);
$pdf->Cell(60,4,"\nCurrent : ".$_POST['current']."\n",1); 
$pdf->Cell(60,4,"\nRoom Temp : ".$_POST['room_temp']."\n",1); 
$pdf->SetXY(158,144);
$pdf->Multicell(120,4,"\nTime Worked : From ".$_POST['time_from']."to                   Date : ".$_POST['time_to']."\n",1,'L'); 
$pdf->SetXY(158,152);
$pdf->Multicell(120,4,"\nMechanic Remarks : ".$_POST['mechanic_remarks']."\n",1,'L'); 
$pdf->SetXY(158,160);
$pdf->Multicell(120,4,"\nName & sign of Mechanic : \n\n",1,'L'); 
$pdf->SetXY(158,168);
$pdf->Multicell(120,4,"\nCustomer's Remarks : ".$_POST['customer_remarks']."\n\n",1,'L'); 






$pdf->Output();
?>