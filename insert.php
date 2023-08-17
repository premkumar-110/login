<?php
session_start();
include("config.php");

$response = array(); // Create an array to store the response

if (isset($_POST['save_reg'])) {
    $name = mysqli_real_escape_string($db, $_POST['username']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($name)) {
        $response['status'] = 422;
        $response['message'] = 'All fields are mandatory';
    } else {
        // Check if username already exists
        $checkQuery = "SELECT uname FROM data WHERE uname = '$name'";
        $checkResult = mysqli_query($db, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $response['status'] = 422; // Conflict status
            $response['message'] = 'Username already exists';
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO data (uname, dob, contact, pass) VALUES ('$name', '$dob', '$contact', '$hashedPassword')";
            $query_run = mysqli_query($db, $query);

            if ($query_run) {
                $response['status'] = 200;
                $response['message'] = 'Registered successfully';

                // Append data to JSON file
                $jsonFilePath = 'registered_users.json';
                $userData = array(
                    'uname' => $name,
                    'dob' => $dob,
                    'contact' => $contact,
                    'pass' => $hashedPassword // Store hashed password in JSON file
                );
                $jsonFileData = file_get_contents($jsonFilePath);
                $existingData = json_decode($jsonFileData, true);
                $existingData[] = $userData;
                $updatedJsonData = json_encode($existingData, JSON_PRETTY_PRINT);
                file_put_contents($jsonFilePath, $updatedJsonData);
            } else {
                $response['status'] = 500;
                $response['message'] = 'Registration failed';
            }
        }
    }

    // Return the JSON response
    echo json_encode($response);
}
?>
