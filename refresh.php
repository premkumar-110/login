<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
    include("config.php");
    $username = $_SESSION['login_user'];

    // Fetch user data from the database using the username
    $sql = "SELECT * FROM data WHERE uname = '$username'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $dob = $row['dob'];
    $contact = $row['contact'];

    $response = array(
        "status" => 200,
        "dob" => $dob,
        "contact" => $contact
        // Add other fields here if needed
    );
} else {
    $response = array("status" => 401, "message" => "User not logged in.");
}

echo json_encode($response);
?>
