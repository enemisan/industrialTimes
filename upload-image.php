<?php
// Database connection settings
$server = 'localhost';
$username = 'indus-admin';
$password = 'dZ3c@2P9!eFq';
$dbname = "testdb";

// Create database connection
$conn = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = file_get_contents($_FILES["image"]["tmp_name"]);

        // Prepare the SQL statement
        $stmt = mysqli_prepare($conn, "INSERT INTO ImageUpload (image) VALUES (?)");
        mysqli_stmt_bind_param($stmt, "s", $image);

        // Execute the statement
        if (mysqli_stmt_execute($stmt) === false) {
            die("Error uploading image: " . mysqli_error($conn));
        }

        echo "Image uploaded successfully!";
    } else {
        echo "Error uploading image.";
    }
}

mysqli_close($conn);
?>
