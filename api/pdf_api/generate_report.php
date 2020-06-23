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
$pdf->Multicell(120,4,"\nName of Customer: ".$data_customer->billing_name."     \nContact Person: ".$data_customer->firstname." ".$data_customer->lastname."\n",1,'L'); 
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
//$pdf->Cell(125,25,"Complaint ID : \n",1);
$pdf->Multicell(120,3,"\nComplaint ID:                                              Date: 18-06-2020\n",1,'L'); 
$pdf->SetXY(158,46);
$pdf->Multicell(120,3,"\nAMC From: 18-06-2020                   AMC TO: 18-06-2020\n",1,'L'); 
$pdf->SetXY(158,56);
$pdf->Multicell(120,4,"Name of Customer: SBI     \nContact Person: Jinesh Patel",1,'L'); 
$pdf->SetXY(158,66);
$pdf->Multicell(120,4,"Address: opposite CTM CROSS ROADS,\n Ahmedabad-38001",1,'L'); 
$pdf->SetXY(158,76);
$pdf->Multicell(120,4,"Mobile : 987654321                       Telephone : 079-12345678\n",1,'L'); 
$pdf->SetXY(158,82);
$pdf->Multicell(120,4,"Nature of Complaint : complaint type ",1,'L'); 
$pdf->SetXY(158,88);
$pdf->Multicell(120,4,"Remarks : remarks",1,'L'); 
$pdf->SetXY(158,94);
$pdf->Multicell(120,4,"Call Assigned to : ",1,'L'); 
$pdf->SetXY(158,100);
$pdf->Multicell(120,4,"Defect Observed : ",1,'L'); 
$pdf->SetXY(158,106);
$pdf->Multicell(120,4,"Action Taken : ",1,'L'); 
$pdf->SetXY(158,112);
$pdf->Multicell(120,4,"Parts Replaced : ",1,'L'); 
$pdf->SetXY(158,118);
$pdf->Multicell(120,4,"Remarks : ",1,'L'); 
$pdf->SetXY(158,124);
$pdf->Cell(60,4,"Line Voltages : ",1); 
//$pdf->SetXY(80,116);
$pdf->Cell(60,4,"Grill Temp : ",1); 
$pdf->SetXY(158,130);
$pdf->Cell(60,4,"Current : ",1); 
//$pdf->SetXY(80,116);
$pdf->Cell(60,4,"Room Temp : ",1); 
$pdf->SetXY(158,136);
$pdf->Multicell(120,4,"Time Worked : From                   to                   Date : ",1,'L'); 
$pdf->SetXY(158,142);
$pdf->Multicell(120,4,"Mechanic Remarks : ",1,'L'); 
$pdf->SetXY(158,148);
$pdf->Multicell(120,4,"Name & sign of Mechanic : ",1,'L');  



$pdf->AddPage();
//$pdf->Image('img/logo.jpeg',10,10,10,10,'JPEG');
$pdf->Image('img/header.jpg',34,10,80,20,'JPG');
//$pdf->Image('img/logo.jpeg',10,10,10,10,'JPEG');
$pdf->Image('img/header.jpg',182,10,80,20,'JPG');
$pdf->SetXY(20,40);
//$pdf->Cell(125,25,"Complaint ID : \n",0);
$pdf->Multicell(120,3,"\nComplaint ID:                                              Date: 18-06-2020\n",0,'L'); 
$pdf->SetXY(20,46);
$pdf->Multicell(120,3,"\nAMC From: 18-06-2020                   AMC TO: 18-06-2020\n",0,'L'); 
$pdf->SetXY(20,52);
$pdf->Multicell(120,4,"\nName of Customer: SBI     \nContact Person: Jinesh Patel\n",0,'L'); 
$pdf->SetXY(20,64);
$pdf->Multicell(120,4,"\nAddress: opposite CTM CROSS ROADS,\n Ahmedabad-38001\n",0,'L'); 
$pdf->SetXY(20,76);
$pdf->Multicell(120,4,"Mobile : 987654321                       Telephone : 079-12345678\n",0,'L'); 
$pdf->SetXY(20,80);
$pdf->Multicell(120,4,"\nNature of Complaint : complaint type\n",0,'L'); 
$pdf->SetXY(20,88);
$pdf->Multicell(120,4,"\nRemarks : remarks\n",0,'L'); 
$pdf->SetXY(20,96);
$pdf->Multicell(120,4,"\nCall Assigned to : \n",0,'L'); 
$pdf->SetXY(20,104);
$pdf->Multicell(120,4,"\nDefect Observed : \n",0,'L'); 
$pdf->SetXY(20,112);
$pdf->Multicell(120,4,"\nAction Taken : \n",0,'L'); 
$pdf->SetXY(20,120);
$pdf->Multicell(120,4,"\nParts Replaced : \n",0,'L'); 
$pdf->SetXY(20,128);
$pdf->Multicell(120,4,"\nRemarks : \n",0,'L'); 
$pdf->SetXY(20,136);
$pdf->Cell(60,4,"\nLine Voltages : \n",0); 
$pdf->Cell(60,4,"\nGrill Temp : \n",0); 
$pdf->SetXY(20,140);
$pdf->Cell(60,4,"\nCurrent : \n",0); 
$pdf->Cell(60,4,"\nRoom Temp : \n",0); 
$pdf->SetXY(20,144);
$pdf->Multicell(120,4,"\nTime Worked : From                   to                   Date : \n",0,'L'); 
$pdf->SetXY(20,152);
$pdf->Multicell(120,4,"\nMechanic Remarks : \n",0,'L'); 
$pdf->SetXY(20,160);
$pdf->Multicell(120,4,"\nName & sign of Mechanic : \n\n",0,'L'); 





$pdf->Output();
?>