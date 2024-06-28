<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "discussions";

// Function to connect to the MySQL database
function connectDatabase() {
    global $servername, $username, $password, $dbname;

    // Create a MySQLi connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}