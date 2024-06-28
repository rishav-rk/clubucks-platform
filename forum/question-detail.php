<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background:transparent">
    <?php
    require_once '../includes/db_connection_forum.php';

    // Get question ID from URL
    $question_id = isset($_GET['id']) ? intval($_GET['id']) : null;

    // Fetch question details from the database
    if ($question_id) {
        // Prepare statement to fetch question details
        $stmt_question = $conn->prepare("SELECT * FROM questions WHERE id = ?");
        $stmt_question->bind_param("i", $question_id);
        $stmt_question->execute();
        $result_question = $stmt_question->get_result();

        if ($question = $result_question->fetch_assoc()) {
            // Display question details
            echo "<div class='container mt-4'>";
            echo "<a type='button' href='discussions.php' class='btn btn-warning mt-5 mb-5'>View Discussions</a>";
            echo "<h1 class='mb-4'>" . htmlspecialchars($question['title']) . "</h1>";
            echo "<p>" . htmlspecialchars($question['description']) . "</p>";
            echo "<h3>Comments</h3>";
            echo "<hr>";

            // Fetch and display answers using prepared statement
            $stmt_answers = $conn->prepare("SELECT * FROM answers WHERE question_id = ? ORDER BY date_posted DESC");
            $stmt_answers->bind_param("i", $question_id);
            $stmt_answers->execute();
            $result_answers = $stmt_answers->get_result();
            
            // Loop through the answers and display them
            while ($answer = $result_answers->fetch_assoc()) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-body'>";
                echo "<p>" . htmlspecialchars($answer['content']) . "</p>";
                echo "<small class='text-muted'>Posted on " . htmlspecialchars($answer['date_posted']) . "</small>";
                echo "</div>";
                echo "</div>";
            }

            // Form to post a new answer
            echo "<div class='post-answer' style='border-top:1px solid black;margin-top:2rem;'>";
            echo "<h4 class='mt-4'>Post Comment</h4>";
            echo "<form action='post-answer.php' method='POST' style='padding:0;'>";
            echo "<input type='hidden' name='question_id' value='" . htmlspecialchars($question_id) . "'>";
            echo "<div class='mb-3'>";
            echo "<textarea class='form-control' name='content' rows='4' placeholder='Write your comment here...' required></textarea>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-success'>Post</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            // Close the statements
            $stmt_question->close();
            $stmt_answers->close();
        } else {
            // Display error if question not found
            echo "<div class='container mt-4'>";
            echo "<p>Question not found.</p>";
            echo "</div>";
        }
    } else {
        // Display error if question ID is not provided
        echo "<div class='container mt-4'>";
        echo "<p>Invalid question ID.</p>";
        echo "</div>";
    }

    // Close the database connection
    $conn->close();
    ?>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>