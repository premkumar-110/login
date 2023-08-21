<?php

header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods (e.g., POST, GET, OPTIONS)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

// Allow specific headers to be sent or received
header("Access-Control-Allow-Headers: Content-Type");
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
