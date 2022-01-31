 <?php
         include("dbconnect.php");
         $postData = (array) json_decode(file_get_contents("php://input", TRUE));
         
         $sql = "INSERT INTO `event` (`name`, `info`, `date`, `location`, `goalID`) VALUES (";
         $sql = sprintf("%s'%s', '%s', '%s', '%s', %s);", $sql, $postData['name'], $postData['info'], str_replace(' ', '', $postData['date']), $postData['location'], $postData['goalID']);
         print_r($sql);
         
         $db->query($sql);
            
        
?>
