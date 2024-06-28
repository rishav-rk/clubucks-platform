<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up | Sign In</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="../css/login.css" />
</head>

<body>
  <div class="container">
    <div class="big-circle"></div>
    <div class="form">
      <div class="contact-form sign-in">
        <form action="login-code.php" method="post" autocomplete="off" class="contrast">
          <h3 class="title-first">Sign In</h3>
          <div class="input-container input-container-first">
            <input type="email" name="email" class="input input-first" />
            <label for="">Email</label>
            <span>Email</span>
          </div>
          <div class="input-container input-container-first">
            <input type="password" name="password" class="input input-first" />
            <label for="">Password</label>
            <span>Password</span>
          </div>
          <input type="hidden" name="red-page" value="<?php echo $_GET['req-page']; ?>" />
          <input type="submit" value="Sign In" name="loginBtn" class="btn btn-first" />
        </form>
      </div>
      <div class="contact-form">
        <div class="circle one"></div>
        <div class="circle two"></div>

        <form action="register-code.php" method="post" autocomplete="off">
          <h3 class="title">Sign Up</h3>
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
          <div class="input-container">
            <input type="password" name="password" class="input" />
            <label for="">Password</label>
            <span>Password</span>
          </div>
          <div class="input-container">
            <input type="password" name="conf-pass" class="input" />
            <label for="">Confirm password</label>
            <span>Confirm password</span>
          </div>
          <input type="hidden" name="red-page" value="<?php echo $_SERVER['PHP_SELF']; ?>" />
          <input type="hidden" name="req-page" value="<?php echo $_GET['req-page']; ?>" />
          <input type="submit" value="Sign Up" name="registerBtn" class="btn" />
        </form>
      </div>
    </div>
  </div>

  <script src="../js/login.js"></script>
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
  <script src="../js/login.js"></script>
</body>
</html>