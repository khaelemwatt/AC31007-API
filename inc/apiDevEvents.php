<?php

include("dbconnect.php");

$devGoal = $params['devGoalID'];
print_r($devGoal);

$sql = "SELECT * FROM event WHERE";
$sqp = sprintf("%s goalID = 1", $sql);

$rows = array();
$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    $rows[] = $row;
}
  header("Access-Control-Allow-Origin: *");
  header('Content-type: application/json');
  echo json_encode($rows);


?>
