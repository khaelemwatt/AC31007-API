<?php

include("dbconnect.php");

$devGoal = $params['devGoalID'];

$sql = "SELECT * FROM Tours WHERE";
$sql = sprintf("%s goalID = %s", $sql, $devGoal);
$result = $db->query($sql);

  header("Access-Control-Allow-Origin: *");
  header('Content-type: application/json');
  echo json_encode($results);


?>