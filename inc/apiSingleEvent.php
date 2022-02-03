<?php

include("dbconnect.php");

$eventId = $params['eventId'];

$sql = "SELECT * FROM event WHERE";
$sql = sprintf("%s eventID = %s", $sql, $eventId);

$rows = array();
$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    $rows[] = $row;
}
  header("Access-Control-Allow-Origin: *");
  header('Content-type: application/json');
  echo json_encode($rows);


?>
