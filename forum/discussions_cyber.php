<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Open Discussions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background:transparent;">
    <?php

    require_once '../includes/db_connection_forum.php';

    // Fetch questions from the database
    $query = "SELECT id, title, description, date_posted FROM questions_cyber ORDER BY date_posted DESC";
    $result = mysqli_query($conn, $query);
    ?>

    <div class="container mt-4">
        <h1 class="mb-4">Cyber Security Discussions</h1>

        <!-- Display questions -->
        <div class="questions">
            <?php while ($question = mysqli_fetch_assoc($result)) { ?>
                <div class="question card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $question['title']; ?></h5>
                        <p class="card-text"><?php echo substr($question['description'], 0, 150); ?>...</p>
                        <a href="question-detail-cyber.php?id=<?php echo $question['id']; ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Option to post new question -->

        <div class="post-question" style="border-top:1px solid black;margin-top:2rem;">
            <h4 class="mt-4">Start a New Discussion</h4>
            <form action="post-question-cyber.php" method="POST" style="padding:0;">
                <div class="mb-3">
                    <label for="question-title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="question-title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="question-description" class="form-label">Description</label>
                    <textarea class="form-control" id="question-description" name="description" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Post</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
