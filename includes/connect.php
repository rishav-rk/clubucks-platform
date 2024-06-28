<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

require_once('../config.php');


$servername = "sql211.infinityfree.com";
$username = "if0_36278753";
$password = "IuR0jnT54E";
$dbname = "if0_36278753_contact";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Prepare and bind SQL statement
    $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    if ($stmt->execute()) {
        // Email configuration
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'clubuckys@gmail.com';
        $mail->Password = $emailPass;
        $mail->SMTPSecure = 'tls'; // Use TLS
        $mail->Port = 587; // TLS port

        $mail->setFrom('clubuckys@gmail.com'); // Your email
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Thank you for your feedback';
$mail->Body = '
    <html>
    <head>
        <title>Thank You for Your Feedback</title>
    </head>
    <body style="font-family: Arial, sans-serif;">
        <p>
            Dear ' . $name . ',
            <br><br>
            Thank you for taking the time to provide us with your valuable feedback. Your input is greatly appreciated and helps us improve our platform to better serve you and other users.
            <br><br>
            If you have any further questions or concerns, feel free to reach out to us at any time.
            <br><br>
            Sincerely,
            <br>
            CluBucks Team
        </p>
    </body>
    </html>
';


        if ($mail->send()) {
            echo '<script>alert("Feedback Submitted Successfully"); window.location.href="../index.php";</script>';
        } else {
            echo "Error: Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo '<script> alert("Oops!")</script>';
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
