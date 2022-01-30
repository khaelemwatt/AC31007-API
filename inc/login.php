//Include databse connection
include("dbconnect.php");

<!-- //Checks if the post values are set (i.e. have been posted) and arent empty
$usernameSet = isset($_POST['username']) && !empty($_POST['username']);
$passwordSet = isset($_POST['password']) && !empty($_POST['password']); -->

<!-- //if both username and password are set and not empty we know the form has been submitted
if($usernameSet && $passwordSet){ -->

//Store the values
$username = $_POST['username'];
$password = $_POST['password'];

//Form the sql query for selecting the password for the username provided
$sql = "SELECT `username`, `password`, `level` FROM `user` WHERE";
$sql = sprintf("%s `username`='%s';", $sql, $username);

//
//NEED TO COVER CASE WHERE USERNAME TYPED IS NOT IN THE DATABASE
//

//Send the database our query and store the result
$result = $db->query($sql);
$row = $result->fetch_array();

//Debug statements
console($sql);
console("Expected Password hash: ".$row['password']);


$userPassword = hash('sha256', $password);
console("Password entered: ".$password);
console("Password entered hash: ".$userPassword);

//Check if the password provided matches the one in the database
if($userPassword == $row['password']){
    //If it matches we will send true result with user data

    $response = array("success" => "true", "username" => $row['username'], "level" => $row['level'];
    $json = json_encode($response);
    echo $json
<!--     if($row['level'] == 0){
        //If user has level 0 they are super admin and can create other admins
        //Redirect this user to the page to create admins
        echo '<script> window.location.href = "/createAdmin" </script>';
    }else{
        //If user has anything else (level 1) they are normal admin who can
        //add/edit/remove events. Redirect them to some page
        echo '<script> window.location.href = "/api/allEvents" </script>';
    } -->

}else{
    //If password doesnt match, reject this login attempt
    console("Rejected");
    echo '<script>reject();</script>';
}            
<!-- }         -->
