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
$customer->customer_id = $complaint->customer_id;

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
$pdf->Multicell(120,3,"\nComplaint ID: ".$_POST['complaint_id']."                                             Date: ".$_POST['date']."\n ",1,'L'); 
$pdf->SetXY(20,49);
$pdf->Multicell(120,3,"\nAMC From : ".$data_amc->fromdate."             AMC To: ".$_POST['amc_to']."\n ",1,'L'); 
$pdf->SetXY(20,58);
$pdf->Multicell(120,4,"\nName of Customer: ".$data_customer->billingname."     \nContact Person: ".$data_customer->firstname." ".$data_customer->lastname."\n ",1,'L'); 
$pdf->SetXY(20,74);
$pdf->Multicell(120,4,"Address: " . $data_customer->address . " " . $data_customer->city . " - " . $data_customer->pincode ." \n\n ",1,'L'); 
$pdf->SetXY(20,86);
$pdf->Multicell(120,4,"Mobile : ".$data_customer->contactno1."                      Mobile-2 : ".$data_customer->contactno2."",1,'L'); 
$pdf->SetXY(20,90);
$pdf->Multicell(120,4,"Nature of Complaint : ".$_POST['complaint_type']."\n ",1,'L'); 
$pdf->SetXY(20,98);
$pdf->Multicell(120,4,"Remarks : ".$_POST['remarks']."\n ",1,'L'); 
$pdf->SetXY(20,106);
$pdf->Multicell(120,4,"Call Assigned to : ".$_POST['mechanic_name']."\n ",1,'L'); 
$pdf->SetXY(20,114);
$pdf->Multicell(120,4,"Defect Observed : ".$_POST['defect_observed']."\n ",1,'L'); 
$pdf->SetXY(20,122);
$pdf->Multicell(120,4,"Action Taken : ".$_POST['action_taken']."\n ",1,'L'); 
$pdf->SetXY(20,130);
$pdf->Multicell(120,4,"Parts Replaced : ".$_POST['parts_replaced']."\n ",1,'L'); 
$pdf->SetXY(20,138);
$pdf->Multicell(120,4,"Remarks : ",1,'L'); 
$pdf->SetXY(20,142);
$pdf->Cell(60,4,"\nLine Voltages : ".$_POST['line_voltage']."\n",1); 
$pdf->Cell(60,4,"\nGrill Temp : ".$_POST['grill_temp']."\n",1); 
$pdf->SetXY(20,146);
$pdf->Cell(60,4,"\nCurrent : ".$_POST['current']."\n",1); 
$pdf->Cell(60,4,"\nRoom Temp : ".$_POST['room_temp']."\n",1); 
$pdf->SetXY(20,150);
$pdf->Multicell(120,4,"Date Worked : From ".$_POST['time_from']."\n                        To ".$_POST['time_to']."",1,'L'); 
$pdf->SetXY(20,158);
$pdf->Multicell(120,4,"Mechanic Remarks : ".$_POST['mechanic_remarks']."\n \n ",1,'L'); 
$pdf->SetXY(20,170);
$pdf->Multicell(120,4,"Name & sign of Mechanic : \n ",1,'L'); 
$pdf->SetXY(20,178);
$pdf->Multicell(120,4,"Customer's Remarks : ".$_POST['customer_remarks']."\n ",1,'L'); 

$pdf->SetXY(158,40);
$pdf->Multicell(120,3,"\nComplaint ID: ".$_POST['complaint_id']."                                             Date: ".$_POST['date']."\n ",1,'L'); 
$pdf->SetXY(158,49);
$pdf->Multicell(120,3,"\nAMC From : ".$data_amc->fromdate."             AMC To: ".$_POST['amc_to']."\n ",1,'L'); 
$pdf->SetXY(158,58);
$pdf->Multicell(120,4,"\nName of Customer: ".$data_customer->billingname."     \nContact Person: ".$data_customer->firstname." ".$data_customer->lastname."\n ",1,'L'); 
$pdf->SetXY(158,74);
$pdf->Multicell(120,4,"Address: " . $data_customer->address . " " . $data_customer->city . " - " . $data_customer->pincode ." \n\n ",1,'L'); 
$pdf->SetXY(158,86);
$pdf->Multicell(120,4,"Mobile : ".$data_customer->contactno1."                      Mobile-2 : ".$data_customer->contactno2."",1,'L'); 
$pdf->SetXY(158,90);
$pdf->Multicell(120,4,"Nature of Complaint : ".$_POST['complaint_type']."\n ",1,'L'); 
$pdf->SetXY(158,98);
$pdf->Multicell(120,4,"Remarks : ".$_POST['remarks']."\n ",1,'L'); 
$pdf->SetXY(158,106);
$pdf->Multicell(120,4,"Call Assigned to : ".$_POST['mechanic_name']."\n ",1,'L'); 
$pdf->SetXY(158,114);
$pdf->Multicell(120,4,"Defect Observed : ".$_POST['defect_observed']."\n ",1,'L'); 
$pdf->SetXY(158,122);
$pdf->Multicell(120,4,"Action Taken : ".$_POST['action_taken']."\n ",1,'L'); 
$pdf->SetXY(158,130);
$pdf->Multicell(120,4,"Parts Replaced : ".$_POST['parts_replaced']."\n ",1,'L'); 
$pdf->SetXY(158,138);
$pdf->Multicell(120,4,"Remarks : ",1,'L'); 
$pdf->SetXY(158,142);
$pdf->Cell(60,4,"\nLine Voltages : ".$_POST['line_voltage']."\n",1); 
$pdf->Cell(60,4,"\nGrill Temp : ".$_POST['grill_temp']."\n",1); 
$pdf->SetXY(158,146);
$pdf->Cell(60,4,"\nCurrent : ".$_POST['current']."\n",1); 
$pdf->Cell(60,4,"\nRoom Temp : ".$_POST['room_temp']."\n",1); 
$pdf->SetXY(158,150);
$pdf->Multicell(120,4,"Date Worked : From ".$_POST['time_from']."\n                        To ".$_POST['time_to']."",1,'L'); 
$pdf->SetXY(158,158);
$pdf->Multicell(120,4,"Mechanic Remarks : ".$_POST['mechanic_remarks']."\n \n ",1,'L'); 
$pdf->SetXY(158,170);
$pdf->Multicell(120,4,"Name & sign of Mechanic : \n ",1,'L'); 
$pdf->SetXY(158,178);
$pdf->Multicell(120,4,"Customer's Remarks : ".$_POST['customer_remarks']."\n ",1,'L'); 

$pdf->Output();
?>
