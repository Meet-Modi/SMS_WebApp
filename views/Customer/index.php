
<?php
$jwt_token = $_GET["jwt"];
//echo($jwt_token);
$myObj = (object)array();
$myObj->jwt = $jwt_token;
$myJSON = json_encode($myObj);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            "http://localhost/SMS_WebApp/api/employee/validate_token.php" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     $myJSON ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

$result=curl_exec ($ch);
$data = json_decode($result);
$userid = $data->data->userid;
$firstname = $data->data->firstname;
$lastname = $data->data->lastname;

$myObj = (object)array();
$myObj->customer_id = "1";
$myObj->option = "2";
$myJSON = json_encode($myObj);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,            "http://localhost/SMS_WebApp/api/customer/show_customers.php" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     $myJSON ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 
$result=curl_exec ($ch);
$result=curl_exec ($ch);
$data_customer = json_decode($result);



if (count($data_customer)) {
            // Open the table
            echo "<table>";
            echo "<tr>";
            // Cycle through the array
            foreach ($data_customer as $stand) {
                // Output a row
                echo "<tr>";
                echo "<td>".$stand->customerid."</td>";
                echo "<td>".$stand->billingname."</td>";
                echo "<td>".$stand->firstname."</td>";
                echo "<td>".$stand->lastname."</td>";
                echo "<td>".$stand->placeid."</td>";
                echo "<td>".$stand->address."</td>";
                echo "</tr>";
            }	
            echo "</tr>";

            // Close the table
            echo "</table>";
        }
?>
