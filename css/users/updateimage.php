<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

session_start();
include("config.php");

$response = array(); // Create an array to store the response

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_changes'])) {

    $username = $_SESSION['login_user'];

    // Upload image to server
    $image = $_FILES['logo']; // Use 'logo' as the name attribute in your input element
    $imageFileName = $image['name'];
    $imageTempPath = $image['tmp_name'];
    $imageFileType = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));
    $allowedImageTypes = array("jpg", "jpeg", "png", "svg");

    if (!in_array($imageFileType, $allowedImageTypes)) {
        $response['status'] = 422;
        $response['message'] = 'Invalid image file type';
        echo json_encode($response);
        exit;
    }

    // Upload image to server
    $uploadPath = 'uploads/' . $imageFileName;
    if (move_uploaded_file($imageTempPath, $uploadPath)) {
        // Update data in the database
        $query = "UPDATE data SET image='$imageFileName' WHERE username='$username'";
        $query_run = mysqli_query($db, $query);

        if ($query_run) {
            $response['status'] = 200;
            $response['message'] = 'Image updated successfully';
        } else {
            $response['status'] = 500;
            $response['message'] = 'Image update failed';
        }
    } else {
        $response['status'] = 500;
        $response['message'] = 'Image upload failed';
    }

    // Return the JSON response
    echo json_encode($response);
}
?>
