<?php 
        //Set error display stuff
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        //Include databse connection
        include("dbconnect.php");

        //Checks if the post values are set (i.e. have been posted) and arent empty
        $usernameSet = isset($_POST['username']) && !empty($_POST['username']);
        $passwordSet = isset($_POST['password']) && !empty($_POST['password']);

        //If both username and password are set and not empty we know the form has been submitted
        if($usernameSet && $passwordSet){

            //Store the values
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = hash('sha256', $password);

            //Form the sql query for selecting the password for the username provided
            $sql = "INSERT INTO `user` (`username`, `password`, `level`) VALUES (";
            $sql = sprintf("%s '%s', '%s', 1);", $sql, $username, $password);

            //
            //NEED TO COVER CASE WHERE USERNAME ALREADY EXISTS IN THE DATABASE
            //

            //Send database our query
            $db->query($sql);     
            
            //Debug Statements
            console($sql);
        }        

    ?>
