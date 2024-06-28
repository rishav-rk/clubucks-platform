<?php
session_start();

if (!isset($_SESSION['loggedInStatus']) || !$_SESSION['loggedInStatus']) {
    header('Location: ../login-system/index.php');
    exit;
}

require_once '../includes/db_connection_forum.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $question_id = isset($_POST['question_id']) ? intval($_POST['question_id']) : null;
    $content = isset($_POST['content']) ? trim($_POST['content']) : '';


    if ($question_id && !empty($content)) {
        try {
            global $conn;
            $conn->begin_transaction();

            // Prepare an INSERT statement to add the new answer to the database
            $stmt = $conn->prepare("INSERT INTO answers (question_id, content, user_id, date_posted) VALUES (?, ?, ?, NOW())");
            
            // Check if the statement is prepared successfully
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . $conn->error);
            }

            // Bind the parameters to the statement
            $user_id = $_SESSION['user_id']; // Assuming the user ID is stored in session
            $stmt->bind_param("isi", $question_id, $content, $user_id);
            
            // Execute the statement
            if (!$stmt->execute()) {
                throw new Exception("Failed to execute statement: " . $stmt->error);
            }

            // Commit the transaction
            $conn->commit();

            // Redirect back to the question details page with the question ID
            header("Location: question-detail.php?id=$question_id");
            exit;

        } catch (Exception $e) {
            // Roll back the transaction if an error occurs
            $conn->rollback();
            
            // Display the error message (you can customize this as needed)
            echo "An error occurred: " . $e->getMessage();
        } finally {
            // Close the statement
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    } else {
        // Display an error message if input is invalid
        echo "Invalid input. Please try again.";
    }
} else {
    // Display an error message if the request method is not POST
    echo "Invalid request method.";
}
?>
