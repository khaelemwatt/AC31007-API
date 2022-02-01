<?php
    include("dbconnect.php");
    $postData = (array) json_decode(file_get_contents("php://input", TRUE));
    

    $sql = "INSERT INTO `user` (`username`, `password`, `level`) VALUES (";
    $sql = sprintf('%s"%s", "%s", 1);', $sql, $postData['username'], hash('sha256', $postData['password']));
    print_r($sql);
    
    $db->query($sql);
?>