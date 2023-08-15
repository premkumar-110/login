<?php
$allowedOrigin = "http://16.171.208.56"; // Replace with your specific allowed origin
header("Access-Control-Allow-Origin: " . $allowedOrigin);
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");
session_start(); // Start or resume the session

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Clear all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Respond with a success message
    $response = array(
        "status" => "success",
        "message" => "Logout successful"
    );
    echo json_encode($response);
    exit();
} else {
    // Respond with an error message
    $response = array(
        "status" => "error",
        "message" => "You are not logged in"
    );
    echo json_encode($response);
    exit();
}
?>
