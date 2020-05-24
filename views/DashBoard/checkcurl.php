<?php 
$jwt_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDAsImRhdGEiOnsidXNlcmlkIjoibWlrZUBjb2Rlb2ZhbmluamEuY29tIiwiZmlyc3RuYW1lIjoiTWlrZSIsImxhc3RuYW1lIjoiRGFsaXNheSIsImFkbWluIjoiMSJ9fQ.d2ax7I90CwePQBmJJkKTdBS_RIr0VPE_EOBBNUOipkI";
$myObj = (object)array();
$myObj->jwt = $jwt_token;
$myJSON = json_encode($myObj);


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            "http://localhost/SMS_WebApp/api/employee/validate_token.php" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     $myJSON); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

$result=curl_exec ($ch);
echo($result);

?> 
