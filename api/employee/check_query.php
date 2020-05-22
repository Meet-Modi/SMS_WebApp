<?php
$user_id = "111";
$firstname = "meet";
$lastname = "modi";
$password = "2eqda";
$admin = 1;

$query = "INSERT INTO employee ";
$query .= "(userid, firstname, lastname, password, admin) VALUES '".$user_id."'";
echo($query);
?>