<?php
session_start();
if(!isset($_SESSION['loggedInStatus'])){

    $_SESSION['message'] = "Login to continue...";
    header('Location: ../login-system/index.php?req-page='.$_SERVER['PHP_SELF']);
    exit();
}
if (isset($_SESSION['message'])) {
  echo '<script>alert("' . $_SESSION['message'] . '");</script>';
  unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head id="scrollbar2">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CluBucks | Discussions
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/discussion.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
require_once '../includes/clubs-header.php';
?>
<div class="container mt-4 mb-4">
    <div class="row mt-4">
        <div class="col-md-2 left-section">
            <!-- Left navigation section -->
            <nav class="forum-nav">
                <ul class="nav flex-column">
                    <li class="nav-item w-75">
                        <a class="nav-link" href="#" onclick="loadContent('open-discussions')">Discussions</a>
                    </li>
                    
                </ul>
            </nav>
        </div>
        <div class="col-md-10">
            <!-- Right content section (iframe) -->
            <iframe src="discussions_cyber.php" width="100%" style="height:86vh"></iframe>
        </div>
    </div>
</div>

<script>
    function loadContent(contentType) {
    const iframe = document.getElementById('content-iframe');
    if (contentType === 'open-discussions') {
        iframe.src = 'discussions.php'; // URL of the page displaying open discussions
    } else if (contentType === 'news-updates') {
        iframe.src = 'news-updates.php'; // URL of the page displaying news and updates
    }
}

</script>
<?php
require_once '../includes/footer.php';
?>