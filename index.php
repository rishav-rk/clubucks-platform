<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clubucks - home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body id="scrollbar2">
    <nav id="main-nav">
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
                            <li class="nav-item"><a href="index.php" class="nav-link fw-bold">Home</a></li>
                            <li class="nav-item"><a href="public/clubs-home.php" class="nav-link fw-bold">My Clubs</a></li>
                            <li class="nav-item"><a href="public/events.php" class="nav-link fw-bold">Events
                                    Calendar</a></li>
                            <li class="nav-item"><a href="#services" class="nav-link fw-bold">Our Services</a></li>

                            <li class="nav-item"><a href="#contact-us" class="nav-link fw-bold">Contact Us</a></li>
                            <li class="nav-item"><a href="#about-us" class="nav-link fw-bold">About Us</a></li>

                        </ul>
                    </div>
                </div>
                <div class="copyrights align-items-end">
                    <small>All right reserved 2024-25 &copy; CluBucks</small>
                </div>
            </div>
        </div>
        <div class="company-name"><a class="compname" href="/index.php">CluBucks</a></div>
        <div class="user">
            <?php
            if (isset($_SESSION['loggedInStatus'])) {
                ?><a href="login-system/logout.php?req-page=<?php echo $_SERVER['PHP_SELF'] ?>" class="signup signup-home">Sign
                    out</a>
                <?php
            } else {
                ?>
                <a href="login-system/index.php?req-page=<?php echo $_SERVER['PHP_SELF'] ?>" class="signup signup-home">Sign In</a>
                <?php
            }
            ?>
        </div>
    </nav>
    <header class="container h-100">
    <div class="row align-items-center justify-content-between">
      <div class="col">
        <!-- <h1 >CluBucks</h1> <br> -->
        <h2 id="gemini-logo"><b>Discover, Engage, and Connect <br> All in one place</b></h2> <br>
        <p class="header_paragraph" id="gemini-logo">
        <h6>Are you eager to stay updated on the latest happenings, seminars, and events at Campus?<br> <br>Look no
          further! Our Events and Seminars Portal is your gateway to a vibrant community of learning, networking, and
          fun-filled experiences.</h5>
          </p>

          <p class="header_paragraph" id="gemini-logo">
          <h6>
            Join us today and embark on a journey of discovery, growth, and endless possibilities. Let's make every
            event a memorable experience together!</h6>
          </p> <br>
          <?php
                   if (!isset($_SESSION['loggedInStatus'])){

          ?>
          <a class="join" onclick="window.location.href='login-system/index.php?req-page=<?php echo $_SERVER['PHP_SELF'] ?>'">Join Now</a>
          <?php }
          else
          {
            ?>
          <a class="join" onclick="alert('You are already logged In.');">Join Now</a> 
          <?php } 
          ?>
      </div>
      <div class="col">

        <img src="images/boy.png" class="banner" height="600" alt="CluBucks">
      </div>
    </div>
  </header>

  
  <a href="#" id="back-to-top"><i class="fa-solid fa-circle-arrow-up"></i></a>

  <!-- OUR SERVICES PAGE  CONTENTS START HERE -->

  <section class="container h-100 w-90" id="services">
    <div class="row align-items-center justify-content-between services">
        <div class="col-lg-8">
            <div id="services">
                <h1 class="services_h1">Our Services</h1>
                <h6 class="header_paragraph">
                    We get it. College life is busy, and finding the perfect event or seminar can feel like a chore. That's where we come in.
                    <br><br>
                    Our streamlined event portal empowers you to:
                    <ul>
                        <li><b>Discover events with ease:</b> Filter by major, club, topic, date, and time.</li>
                        <li><b>Register in a flash:</b> No more hunting down permission slips or paper forms. Sign up for events and seminars with just a few clicks.</li>
                        <li><b>Stay in the loop:</b> Get notified about upcoming events relevant to your studies and passions. Never miss an opportunity to learn, network, and grow.</li>
                        <li><b>Uncover hidden gems:</b> Our recommendation engine personalizes your experience, suggesting events you might not have found on your own.</li>
                        <li><b>Connect with like-minded peers: </b>Discuss upcoming events and find fellow students who share your interests through our interactive platform.</li>
                    </ul>
                </h6>
              </div>
            </div>
            <div class="col-lg-4">
          <img src="images/black-white.png" class="service-banner img-fluid" alt="">
            <div class="ser-img">
            </div>
        </div>
    </div>
</section>
<!-- ABOUT-US PAGE -->
<div class="divider">

</div>
<section class="about-us-section container my-5" id="about-us">
    <div class="text-center mb-4">
        <h2>About Us</h2>
    </div>
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <img src="images/about-us.png" class="img-fluid" alt="About Us">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h4>Our Mission</h4>
            <p>Our mission is to provide exceptional services that empower individuals to achieve their goals. We are committed to fostering a community of innovation, creativity, and growth.</p>
            <h4>Our Vision</h4>
            <p>We envision a world where technology and creativity converge to create impactful solutions that drive positive change.</p>
            <h4>Our Values</h4>
            <p>We value integrity, collaboration, and continuous learning. Our team is dedicated to delivering excellence in everything we do.</p>
        </div>
    </div>
</section>



  <!-- CONTACT-US PAGE -->

  <div class="contact-us" id="contact-us" >
    <div class="contain">
      <!-- <div class="big-circle"></div> -->
      <div class="form">

        <div class="contact-info">

          <a href="#scrollbar2">
            <h5 class="title"> Let's Get in Touch</h5>
          </a>

          <p class="text">
            <br>

            Send Your Feedback About Your Experience on Portal to So that we can improve the productivity of CluBucks.
          </p>

          <div class="info">
            <div class="information">
              <i class="fa-solid fa-map-location-dot icon"></i>
              <p>PGGC Sector - 11 , Chandigarh</p>
            </div>
            <div class="information">
              <i class="fa-solid fa-envelope icon"></i>
              <p>CluBucks@gmail.com</p>
            </div>
            <div class="information">
              <i class="fa-solid fa-phone-volume icon"></i>
              <p>1234-567-890</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with Us</p>
            <div class="social-icons social-contact">
              <a href="https://www.instagram.com/_yaman_sahota_/"><i class="fab fa-instagram"></i></a>
              <a href="https://github.com/yamansahota"><i class="fab fa-github"></i></a>
              <a href="https://www.linkedin.com/in/yaman-sahota-1b2b44280/"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
        <div class="contact-form">
          <div class="circle one"></div>
          <div class="circle two"></div>

          <form method="post" action="includes/connect.php">
            <h3 class="title">Contact Us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Name</label>
              <span>Name</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" />
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Send Feeback" class="inbtn">
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- FOOTER HERE  -->
  <footer>
        <div class="flex_them" id="about">

            <h3>CluBucks</h3>
            
            <ul class="navigation">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="index.html#contact-form">About</a></li>
                <li><a href="#contact-us">Contact</a></li>
            </ul>
        </div>
            
        <div class="social-icons my-3">
          <a href="https://www.instagram.com/the_explorer_rishav/" id="social-anchors" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg></a>
          <a href="https://github.com/rishav-rk" id="social-anchors" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-github"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg></a>
          <a href="https://www.linkedin.com/in/rishav-kumar-29b2a328b/" id="social-anchors" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg></a>
        </div>
    
        <div class="copyright">
        2024 Copyright © CluBucKS - All rights reserved
        </div>
    </footer>
<script src="js/home.js"></script>
<script src="js/home-contact.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <?php
  if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
    echo "hello";
    foreach ($_SESSION['errors'] as $error) {
      echo '<script>alert("' . $error . '");</script>';
    }
    unset($_SESSION['errors']);
  }

  if (isset($_SESSION['message'])) {
    echo '<script>alert("' . $_SESSION['message'] . '");</script>';
    unset($_SESSION['message']);
  }
  ?>

</body>
</html>