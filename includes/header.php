<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clubucks - home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body{
            background: transparent;
        }
    </style>
</head>
<body>
    <nav class="event-nav">
        <div class="menu">
            <a data-bs-toggle="offcanvas" href="#sidemenubar" role="button" aria-controls="sidemenubar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30" viewBox="0 -5 24 24" fill="none"
                    stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-menu">
                    <line x1="4" x2="20" y1="12" y2="12" />
                    <line x1="4" x2="40" y1="6" y2="6" />
                    <line x1="4" x2="40" y1="18" y2="18" />
                </svg>
            </a>
            <div class="offcanvas offcanvas-start nav-backgroud" tabindex="-1" id="sidemenubar"
                aria-labelledby="sidemenubarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close m-0 btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body m-3">
                    <div id="menu-window">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="../index.php" class="nav-link fw-bold">Home</a></li>
                            <li class="nav-item"><a href="../public/clubs-home.php" class="nav-link fw-bold">My Clubs</a></li>
                            <li class="nav-item"><a href="../public/events.php" class="nav-link fw-bold">Events
                                    Calendar</a></li>
                            <li class="nav-item"><a href="#about" class="nav-link fw-bold">About Us</a></li>
                            <li class="nav-item"><a href="#contact" class="nav-link fw-bold">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="copyrights align-items-end">
                    <small>All right reserved 2024-25 &copy; ClubBucks</small>
                </div>
            </div>
        </div>
        <div class="company-name"><a href="/index.php" style="color:black;">CluBucks</a></div>
        <div class="user">
            <?php
            if (isset($_SESSION['loggedInStatus'])) {
                ?><a href="../login-system/logout.php?req-page=<?php echo $_SERVER['PHP_SELF'] ?>" style="color:black;" class="signup">Sign
                    out</a>
                <?php
            } else {
                ?>
                <a href="../login-system/index.php?req-page=<?php $_SERVER['PHP_SELF'] ?>" style="color:black;" class="signup">Sign In</a>
                <?php
            }
            ?>
        </div>
    </nav>