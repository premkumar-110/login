

<?php

    header("Access-Control-Allow-Origin: *");

    // Allow specific HTTP methods (e.g., POST, GET, OPTIONS)
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

    // Allow specific headers to be sent or received
    header("Access-Control-Allow-Headers: Content-Type");
    define('DB_SERVER', 'byscyr5lqkwbhrgtq3fe-mysql.services.clever-cloud.com');
    define('DB_USERNAME', 'uj8ttg24hfimwvff');
    define('DB_PASSWORD', 'wAFtzxREwf5yaLqrnHDQ');
    define('DB_DATABASE', 'byscyr5lqkwbhrgtq3fe');

    // Attempt to connect to the database
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>