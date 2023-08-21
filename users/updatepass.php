<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start();
include("config.php");

$response = array(); // Create an array to store the response

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_changes'])) {
    $oldPass = mysqli_real_escape_string($db, $_POST['oldPass']);
    $newPass = mysqli_real_escape_string($db, $_POST['newPass']);
    $confirmNewPass = mysqli_real_escape_string($db, $_POST['newConfirmPass']);

    $username = $_SESSION['login_user'];

    // Retrieve current user data
    $selectSql = "SELECT * FROM data WHERE email = '$username'";
    $result = mysqli_query($db, $selectSql);
    $userData = mysqli_fetch_assoc($result);

    // Check if the old password matches the password in the database
    if (password_verify($oldPass, $userData['pass'])) {
        // Check if the new password is empty
        if (!empty($newPass)) {
            // Verify if new password and confirm new password match
            if ($newPass === $confirmNewPass) {
                // Hash the new password before storing it
                $hashedPassword = password_hash($newPass, PASSWORD_DEFAULT);

                // Update the password in the database
                $updateSql = "UPDATE data SET pass = '$hashedPassword' WHERE email = '$username'";
                if (mysqli_query($db, $updateSql)) {
                    $response['status'] = 200;
                    $response['message'] = 'Password updated successfully';
                } else {
                    $response['status'] = 500;
                    $response['message'] = 'Failed to update password';
                }
            } else {
                $response['status'] = 400;
                $response['message'] = 'New password and confirm password do not match';
            }
        } else {
            $response['status'] = 400;
            $response['message'] = 'New password cannot be empty';
        }
    } else {
        $response['status'] = 401;
        $response['message'] = 'Old password does not match';
    }

    // Return the JSON response
    echo json_encode($response);
}
?>
