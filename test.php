<?php
// Database connection settings
$server = 'localhost';
$username = 'indus-admin';
$password = 'dZ3c@2P9!eFq';
$dbname = "testdb";

// Create database connection
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === false) {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Create the table
$sql = "CREATE TABLE IF NOT EXISTS ImageUpload (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image LONGBLOB
)";

if ($conn->query($sql) === false) {
    die("Error creating table: " . $conn->error);
}

echo "Database and table created successfully!";

$conn->close();
?>
