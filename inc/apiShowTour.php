<?php

include("dbconnect.php");

$devGoal = $params['devGoalID'];

$sql = "SELECT * FROM Tours WHERE";
$sql = sprintf("%s goalID = %s", $sql, $devGoal);
$rows = array();
$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    $rows[] = $row;
}
  header("Access-Control-Allow-Origin: *");
  header('Content-type: application/json');
  echo json_encode($rows);
?>