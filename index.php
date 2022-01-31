<?php

define('INCLUDE_DIR', dirname(__FILE__) . '/inc/');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$rules = array(
    //
    //API Routes
    'apiShowEvents' => "/api/allEvents",
    'apiShowSingleDogs' => "/api/singleDog/(?'dogID'[\w\-]+)",
    'apiEditEvent' => "/api/editEvent",


    //Admin Pages
    //
    'login' => "/login",
    'createEvent' => "/createEvent",
    'logout' => "/logout",
    'createTour' => "/createTour",
    //
    // Home Page
    //
    'home' => "/"
    //
    // Style
    //
);

$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);

foreach ($rules as $action => $rule) {
    if (preg_match('~^' . $rule . '$~i', $uri, $params)) {
        include(INCLUDE_DIR . $action . '.php');
        exit();
    }
}

// nothing is found so handle the 404 error
include(INCLUDE_DIR . '404.php');

?>
