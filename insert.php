<?php
include("config.php");

$response = array(); // Create an array to store the response

if (isset($_POST['save_reg'])) {
    $name = mysqli_real_escape_string($db, $_POST['username']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($name)) {
        $response['status'] = 422;
        $response['message'] = 'All fields are mandatory';
    } else {
        $query = "INSERT INTO data (uname, dob, contact, pass) VALUES ('$name', '$dob', '$contact', '$pass')";
        $query_run = mysqli_query($db, $query);

        if ($query_run) {
            $response['status'] = 200;
            $response['message'] = 'Registered successfully';
        } else {
            $response['status'] = 500;
            $response['message'] = 'Registration failed';
        }
    }

    // Return the JSON response
    echo json_encode($response);
}
?>
