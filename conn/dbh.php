<?php
// Server credentials
$server = 'localhost';
$username = 'indus-admin';
$password = 'dZ3c@2P9!eFq';

// Connect to the server
$conn = mysqli_connect($server, $username, $password);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// // Create the database
// $sql = "CREATE DATABASE industrialtimes";
// if (mysqli_query($conn, $sql)) {
//     echo "Database 'industrialtimes' created successfully\n";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }

// Switch to the database
mysqli_select_db($conn, "industrialtimes");

// // Create the 'news' table
// $sql = "CREATE TABLE news (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(255),
//     author VARCHAR(255),
//     article TEXT,
//     image LONGBLOB,
//     date DATE
// )";
// if (mysqli_query($conn, $sql)) {
//     echo "Table 'news' created successfully\n";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

?>
