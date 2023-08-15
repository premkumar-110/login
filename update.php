<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST"); // Allow only POST requests
header("Content-Type: application/json");
session_start();
include("config.php");

$response = array(); // Create an array to store the response

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_changes'])) {
    $newDOB = mysqli_real_escape_string($db, $_POST['new_dob']);
    $newContact = mysqli_real_escape_string($db, $_POST['new_contact']);
    $username = $_SESSION['login_user'];

    // Retrieve current user data
    $selectSql = "SELECT * FROM data WHERE uname = '$username'";
    $result = mysqli_query($db, $selectSql);
    $userData = mysqli_fetch_assoc($result);

    if (!$userData) {
        $response['status'] = 404; // User not found status
        $response['message'] = 'User not found';
    } else {
        // Update user data
        $userData['dob'] = $newDOB;
        $userData['contact'] = $newContact;

        // Perform update in the database
        $updateSql = "UPDATE data SET dob = '$newDOB', contact = '$newContact' WHERE uname = '$username'";
        if (mysqli_query($db, $updateSql)) {
            $response['status'] = 200;
            $response['message'] = 'Data updated successfully';

            // Update data in JSON file (optional)
            $jsonFilePath = 'registered_users.json';
            $updatedJsonData = json_encode($userData, JSON_PRETTY_PRINT);
            file_put_contents($jsonFilePath, $updatedJsonData);
        } else {
            $response['status'] = 500; // You can customize the status code
            $response['message'] = 'Failed to update data'; // You can customize the message
        }
    }

    // Return the JSON response
    echo json_encode($response);
}
?>
