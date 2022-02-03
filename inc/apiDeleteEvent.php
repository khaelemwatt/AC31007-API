<?php
    include("dbconnect.php");
    $postData = (array) json_decode(file_get_contents("php://input", TRUE));

    $sql = sprintf('DELETE FROM event WHERE EventId = %d', $postData['EventId']);

    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json');

    if ($db->query($sql) === TRUE)
        echo '{"successful":true}';
    else 
        echo '{"successful":false}';
?>
