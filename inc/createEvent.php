 <?php
            
        $nameSet = isset($_POST['eventName']) && !empty($_POST['eventName']);
        $infoSet = isset($_POST['eventInfo']) && !empty($_POST['eventInfo']);
        $DateSet = isset($_POST['eventDate']) && !empty($_POST['eventDate']);
        $LocationSet = isset($_POST['eventLocation']) && !empty($_POST['eventLoaction']);
        //$goalSet = isset($_GET['UNGoalID']) && !empty($_GET['UNGoalID']);
        echo "one";
        echo "two";

        if($_POST['eventLocation'] == "test")
        {
         // Include the database connection
            include "dbconnect.php";
            // Check that a form has been submitted

            $inputEventName = $_POST['eventName'];
            $inputEventInfo = $_POST['eventInfo'];
            $inputEventDate = $_POST['eventDate'];
            $inputEventLocation = $_POST['eventLocation'];
            echo "three";
            $inputGoal = $_POST['UNGoalID'];
            
            $sql = "INSERT INTO `event` (Name, Info, Date, Location, goalID) VALUES ('";
            $sql = sprintf("%s, '%s', '%s', %s, '%s', %s);", $sql, $inputEventName, $inputEventInfo, $inputEventDate, $inputEventLocation, $inputGoal);
            console($sql);
            echo "four";
            $createStmt = $mysql->prepare($sql);
            echo "five";
            console($createStmt);
            $createStmt->execute();
            $result = $createStmt->fetchAll();
            if($result == false){
                echo "Event creation failed please try again";
                echo $inputEventName;
                echo $inputEventInfo;
                echo $inputEventDate;
                echo $inputEventLocation;
                echo $inputGoal;
            }else{
                $readStmt = $mysql->prepare("SELECT * 'event'");
                $readStmt->execute();
                echo $inputEventName;
                echo $inputEventInfo;
                echo $inputEventDate;
                echo $inputEventLocation;
                echo $inputGoal;
            }
            foreach($result as $row) {
                echo "<td>".$row['UN Sustainable Development Goal Event']."</td>";
                echo "<td>".$row['About the Event']."</td>";
                echo "<td>".$row['Date of the Event']."</td>";
                echo "<td>".$row['Location of the Event']."</td></tr>";
            }
        }
    ?>
