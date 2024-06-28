<?php
session_start();

// Check if the user is logged in
echo $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page if not logged in
    header('Location: ../login-system/index.php?req-page='.$_SERVER['PHP_SELF']);
    exit();
}

// Include database connection file
require_once '../includes/db_connection_forum.php';

// Function to handle question posting
function post_question($conn, $user_id, $title, $description) {
    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO questions (user_id, title, description, date_posted) VALUES (?, ?, ?, NOW())");
        
        // Bind the parameters
        $stmt->bind_param("iss", $user_id, $title, $description);
        
        // Execute the statement
        $stmt->execute();
        
        // Check for errors
        if ($stmt->affected_rows > 0) {
            return true; // Successfully inserted the question
        } else {
            return false; // Failed to insert the question
        }
    } catch (mysqli_sql_exception $e) {
        // Log the error and return false
        error_log("Error in post_question: " . $e->getMessage());
        return false;
    } finally {
        // Close the statement
        $stmt->close();
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $user_id = $_SESSION['user_id'];
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    // Validate the input data
    if (empty($title) || empty($description)) {
        $error_message = "Title and description cannot be empty.";
    } else {
        // Post the question
        $result = post_question($conn, $user_id, $title, $description);
        
        if ($result) {
            // Redirect to the open discussions page or another page
            header("Location: discussions.php");
            exit();
        } else {
            $error_message = "Failed to post the question. Please try again.";
        }
    }
}

// Include the header file
require_once '../includes/clubs-header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Post a Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Post a Question</h1>
        
        <!-- Display error message if there is any -->
        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
        
        <!-- Form to post a question -->
        <form action="post_question.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Question Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Question</button>
        </form>
    </div>

    <!-- Include the footer file -->
    <?php require_once '../includes/footer.php'; ?>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
