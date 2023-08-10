<?php
session_start();
include("config.php");

$response = array(); // Create an array to store the response

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_login'])) {
    // username and password sent from form 
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']); 
    
    $sql = "SELECT * FROM data WHERE uname = '$myusername' and pass = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    $count = mysqli_num_rows($result);
    if (empty($myusername)) {
        $response['status'] = 422;
        $response['message'] = 'Username and password is required';
    }
    // If result matched $myusername and $mypassword, table row must be 1 row
    else if ($count == 1) {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['login_user'] = $myusername; // Store the username
        
        $response['status'] = 200;
        $response['message'] = 'Login successful';
    } else {
        $response['status'] = 422; // You can customize the status code
        $response['message'] = 'User not found!'; // You can customize the message
    }

    // Return the JSON response
    echo json_encode($response);
}
?>
