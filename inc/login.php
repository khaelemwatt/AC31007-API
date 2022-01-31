<?php
//Include databse connection
include("dbconnect.php");

// $post = (array) json_decode(file_get_contents("php://input", TRUE));

$test = $db->query("SELECT * FROM `user` WHERE `username`='admin';");
print_r($test);
$testrow = $test->fetch_array();
print_r($testrow);
echo json_encode($testrow);

// var_dump($post);
// echo json_encode($post);

// //Form the sql query for selecting the password for the username provided
// $sql = "SELECT `username`, `password`, `level` FROM `user` WHERE";
// $sql = sprintf("%s `username`='%s';", $sql, $post['username']);


// //
// //NEED TO COVER CASE WHERE USERNAME TYPED IS NOT IN THE DATABASE
// //

// //Send the database our query and store the result
// $result = $db->query($sql);
// $row = $result->fetch_array();


// $userPassword = hash('sha256', $password);
         
?>
