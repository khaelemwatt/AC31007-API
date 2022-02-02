<?php
    include("dbconnect.php");
    $postData = (array) json_decode(file_get_contents("php://input", TRUE));

    $sql = sprintf('DELETE FROM event WHERE EventId = %d', $postData['EventId']);

    if ($db->query($sql) === TRUE)
        echo '{"successful":true}';
    else 
        echo '{"successful":false}';
?>
