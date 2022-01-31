<?php

include("dbconnect.php");
$postData = (array) json_decode(file_get_contents("php://input", TRUE));

$sql = "SELECT * FROM user WHERE username = '";
$sql = sprintf("%s%s';", $sql, $postData['username']);

$rows = array();
$result = $db->query($sql);
$row = $result->fetch_array()

$password = $postData['password'];
$password = hash("sha256", $password);
print_r($row);
print_r($row['password']);

if($password == $rows['password']){
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json');
    //print_r($rows);
    echo json_encode($row);
}

php?>
