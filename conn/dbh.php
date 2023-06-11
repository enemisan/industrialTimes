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

// Switch to the database
mysqli_select_db($conn, "industrialtimes");

// Check if the database exists
$result = mysqli_query($conn, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'industrialtimes'");
if (mysqli_num_rows($result) == 0) {
    // Create the database
    $sql = "CREATE DATABASE industrialtimes";
    if (mysqli_query($conn, $sql)) {
        echo "Database 'industrialtimes' created successfully\n";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }
}

// Switch to the database
mysqli_select_db($conn, "industrialtimes");

// Check if the table exists
$result = mysqli_query($conn, "SHOW TABLES LIKE 'news'");
if (mysqli_num_rows($result) == 0) {
    // Create the 'news' table
    $sql = "CREATE TABLE news (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        author VARCHAR(255),
        article TEXT,
        image LONGBLOB,
        date DATE
    )";
    if (mysqli_query($conn, $sql)) {
        echo "Table 'news' created successfully\n";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // Add the 'pagelink' column
    $sql = "ALTER TABLE news ADD pagelink VARCHAR(255)";
    if (mysqli_query($conn, $sql)) {
        echo "New column 'pagelink' added successfully\n";
    } else {
        echo "Error adding new column: " . mysqli_error($conn);
    }
}

// Define an array of table names
$tables = array('association', 'banks', 'companies', 'commerce', 'leaders', 'regulators', 'trade', 'technology', 'events');

// Loop through each table and check if it exists
foreach ($tables as $table) {
    $result = mysqli_query($conn, "SHOW TABLES LIKE '$table'");
    if (mysqli_num_rows($result) == 0) {
        // Create the table
        $sql = "CREATE TABLE $table (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255),
            author VARCHAR(255),
            article TEXT,
            image LONGBLOB,
            date DATE
        )";
        if (mysqli_query($conn, $sql)) {
            echo "Table '$table' created successfully\n";
        } else {
            echo "Error creating table '$table': " . mysqli_error($conn);
        }
    }
}
?>