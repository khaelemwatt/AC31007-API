<?php
//Include databse connection
include("dbconnect.php");

$post = (array) json_decode(file_get_contents("php://", TRUE));

$test = "SELECT * FROM `user` where `username` = 'admin'";
$testResult = $db->query($test);
echo json_encode($testResult);

// //Form the sql query for selecting the password for the username provided
$sql = "SELECT `username`, `password`, `level` FROM `user` WHERE";
$sql = sprintf("%s `username`='%s';", $sql, $post['username']);


// //
// //NEED TO COVER CASE WHERE USERNAME TYPED IS NOT IN THE DATABASE
// //

//Send the database our query and store the result
$result = $db->query($sql);
$row = $result->fetch_array();


$userPassword = hash('sha256', $password);

//Check if the password provided matches the one in the database
if($userPassword == $row['password']){
    //If it matches we will send true result with user data

    $response = array("success" => "true", "username" => $row['username'], "level" => $row['level']);
    echo json_encode($response);  


}else{
    //If password doesnt match, reject this login attempt
    $response = array("success" => "false");
    echo json_encode($response);
}            
?>
