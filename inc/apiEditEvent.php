<?php

include("dbconnect.php");
$postData = (array) json_decode(file_get_contents("php://input", TRUE));

$sql = sprintf("UPDATE event SET Name = '%s', Location = '%s', Date = '%s', Info = '%s', goalID = %d WHERE EventId = %d;", $postData['Name'], $postData['Location'], $postData['Date'], $postData['Info'], $postData['goalID'], $postData['EventId']);

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

if ($db->query($sql) === TRUE)
    echo '{"successful":true}';
else 
    echo '{"successful":false}';

?>
