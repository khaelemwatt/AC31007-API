<?php
//Include databse connection
include("dbconnect.php");

console("test");

if($isset($_POST['username']) && !empty($_POST['username'])){
  echo json_encode($_POST['username']);
}

// $data = trim(file_get_contents('php://input'));
// console($data);

//Form the sql query for selecting the password for the username provided
$sql = "SELECT `username`, `password`, `level` FROM `user` WHERE";
$sql = sprintf("%s `username`='%s';", $sql, $username);

// $test = $db->query("SELECT * FROM `user` WHERE `username`='admin';");
// $testrow = $test->fetch_array();
// echo json_encode($testrow);

//
//NEED TO COVER CASE WHERE USERNAME TYPED IS NOT IN THE DATABASE
//

//Send the database our query and store the result
$result = $db->query($sql);
$row = $result->fetch_array();

//Debug statements
// console($sql);
// console("Expected Password hash: ".$row['password']);


$userPassword = hash('sha256', $password);
// console("Password entered: ".$password);
// console("Password entered hash: ".$userPassword);

//Check if the password provided matches the one in the database
if($userPassword == $row['password']){
    //If it matches we will send true result with user data

    $response = array("success" => "true", "username" => $row['username'], "level" => $row['level']);
    echo json_encode($response);  


}else{
    //If password doesnt match, reject this login attempt
    //console("Rejected");
    $response = array("success" => "false");
    echo json_encode($response);
}            
?>
