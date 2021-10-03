<?php

try {
  $conn = new PDO('sqlite:db/school_fee.sqlite3'); 
}catch (Exception $e) {
  echo "Unable to connect";
  echo $e->getMessage();
  exit;
}

session_start();
$_SESSION['time'] = time();

?>