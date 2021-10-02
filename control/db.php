<?php

//$servername = "localhost";
//$username = "id7116770_account";//"root";
//$password = "@Account12345";
//$database = "id7116770_pay_collection";//"pay_collection";

// Create connection
//$conn = new mysqli($servername, $username, $password,$database);

// Check connection
//if ($conn->connect_error) {
//  die("Connection failed: " . $conn->connect_error);/
//}

try {
  $conn = new PDO('sqlite:db/hopefraf_account.db'); 
}catch (Exception $e) {
  echo "Unable to connect";
  echo $e->getMessage();
  exit;
}

session_start();
$_SESSION['time'] = time();

?>