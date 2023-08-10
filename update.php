<?php
session_start();
include("config.php");

$response = array(); // Create an array to store the response

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_changes'])) {
    $newDOB = mysqli_real_escape_string($db, $_POST['new_dob']);
    $newContact = mysqli_real_escape_string($db, $_POST['new_contact']);
    $username = $_SESSION['login_user'];

    $updateSql = "UPDATE data SET dob = '$newDOB', contact = '$newContact' WHERE uname = '$username'";
    if (mysqli_query($db, $updateSql)) {
        $response['status'] = 200;
        $response['message'] = 'Data updated successfully';
    } else {
        $response['status'] = 500; // You can customize the status code
        $response['message'] = 'Failed to update data'; // You can customize the message
    }

    // Return the JSON response
    echo json_encode($response);
}
?>
