<?php

header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods (e.g., POST, GET, OPTIONS)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

// Allow specific headers to be sent or received
header("Access-Control-Allow-Headers: Content-Type");

session_start();
include("config.php");

$response = array(); // Create an array to store the response

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_login'])) {
    $myusername = mysqli_real_escape_string($db, $_POST['email']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']); 

    if (empty($myusername) || empty($mypassword)) {
        $response['status'] = 422;
        $response['message'] = 'Username and password are required';
    } else {
        $sql = "SELECT * FROM data WHERE email = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $myusername);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // Verify the hashed password
            if (password_verify($mypassword, $row['pass'])) {
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['login_user'] = $myusername; // Store the username
                $_SESSION['login_pass']= $mypassword;
                
                $response['status'] = 200;
                $response['message'] = 'Login successful';
            } else {
                $response['status'] = 422;
                $response['message'] = 'Invalid password';
            }
        } else {
            $response['status'] = 422;
            $response['message'] = 'User not found';
        }
    }

    // Return the JSON response
    echo json_encode($response);
}
?>
