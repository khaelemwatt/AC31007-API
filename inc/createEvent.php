 <?php
         include("dbconnect.php");
         $postData = (array) json_decode(file_get_contents("php://input", TRUE));
         
         $sql = "INSERT INTO `event` (`name`, `info`, `date`, `location`, `goalID`) VALUES (";
         $sql = sprintf("%s'%s', '%s', '%s', '%s', %s);", $sql, $postData['name'], $postData['info'], str_replace(' ', '', $postData['date']), $postData['location'], $postData['goalID']);
         print_r($sql);
         
         $rows = array();
         $result = $db->query($sql);
        //  $row = $result->fetch_array();
         
        //  $password = $postData['password'];
        //  $password = hash("sha256", $password);
         
        //  if($password == $row['password']){
        //      header("Access-Control-Allow-Origin: *");
        //      header('Content-type: application/json');
        //      echo json_encode($row);
        //  }
            
        
?>
