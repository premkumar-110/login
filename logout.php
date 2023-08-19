<?php
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
