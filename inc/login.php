<?php

include("dbconnect.php");

$sql = "SELECT * FROM user";

$rows = array();
$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    $rows[] = $row;
}
  header("Access-Control-Allow-Origin: *");
  header('Content-type: application/json');
  print_r($rows);
  echo json_encode($rows);


php?>
