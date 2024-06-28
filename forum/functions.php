<?php
require_once 'config.php';

// Function to insert a new discussion
$conn = connectDatabase();
$currentTable = $_COOKIE['currentTable'];
function insertDiscussion($name, $message) {
    global $currentTable,$conn;
    // Prepare an SQL statement to insert a new discussion
    $stmt = $conn->prepare("INSERT INTO $currentTable (name, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $message);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();

    // Close the MySQLi connection
}

// Function to retrieve discussions from the database
function getDiscussions() {
    // Ensure that the table name is not empty
    // Connect to the database
    global $conn;
    global $currentTable;

    // Construct the SQL query using $currentTable
    $query = "SELECT * FROM `$currentTable` ORDER BY created_at DESC";

    // Execute the query and handle potential errors
    $result = $conn->query($query);

    if ($result === false) {
        throw new Exception('Query failed: ' . $conn->error);
    }

    $discussions = [];
    while ($row = $result->fetch_assoc()) {
        $discussions[] = $row;
    }
    return $discussions;
}
