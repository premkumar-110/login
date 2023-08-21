<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start();
include("config.php");

$response = array();

if (isset($_POST['save_reg'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $fname= mysqli_real_escape_string($db, $_POST['fname']);
    $lname= mysqli_real_escape_string($db, $_POST['lname']);

    // Validate all fields
    if (empty($email) || empty($dob) || empty($phone) || empty($contact) || empty($password) || empty($_FILES['image']['name'])) {
        $response['status'] = 422;
        $response['message'] = 'All fields are mandatory';
        echo json_encode($response);
        exit;
    }

    // Check if email already exists
    $checkQuery = "SELECT * FROM data WHERE email = '$email'";
    $checkResult = mysqli_query($db, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        $response['status'] = 422;
        $response['message'] = 'Email already exists';
        echo json_encode($response);
        exit;
    }

    // Handle image upload
    $image = $_FILES['image'];
    $imageFileName = $image['name'];
    $imageTempPath = $image['tmp_name'];
    $imageFileType = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));
    $allowedImageTypes = array("jpg", "jpeg", "png");

    if (!in_array($imageFileType, $allowedImageTypes)) {
        $response['status'] = 422;
        $response['message'] = 'Invalid image file type';
        echo json_encode($response);
        exit;
    }

    // Upload image to server
    $uploadPath = 'uploads/' . $imageFileName;
    if (move_uploaded_file($imageTempPath, $uploadPath)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $query = "INSERT INTO data (email, dob, contact, pass, phone, image, fname, lname) VALUES ('$email', '$dob', '$contact', '$hashedPassword', '$phone', '$imageFileName', '$fname', '$lname')";
        $query_run = mysqli_query($db, $query);

        if ($query_run) {
            $response['status'] = 200;
            $response['message'] = 'Registered successfully';
        } else {
            $response['status'] = 500;
            $response['message'] = 'Registration failed';
        }
    } else {
        $response['status'] = 500;
        $response['message'] = 'Image upload failed';
    }

    echo json_encode($response);
}
?>
