<?php
         include("dbconnect.php");
         $postData = (array) json_decode(file_get_contents("php://input", TRUE));
         
         $sql = "INSERT INTO `Tours` (`name`, `location`, `goalID` ,`events`) VALUES (";
         $sql = sprintf('%s"%s", "%s", "%s", %s);', $sql, $postData['name'], $postData['location'], $postData['goalID'],$postData['Events']);
         print_r($sql);
         $db->query($sql);
?>