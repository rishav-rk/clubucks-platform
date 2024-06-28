<?php
session_start();

require_once "database-login.php";
require_once '../config.php';
require_once '../phpmailer/src/Exception.php';
require_once '../phpmailer/src/PHPMailer.php';
require_once '../phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_REQUEST['registerBtn']))
{
    $errors = [];
    $name = mysqli_real_escape_string($conn,$_REQUEST['name']);
    $phone = mysqli_real_escape_string($conn,$_REQUEST['phone']);
    $email = mysqli_real_escape_string($conn,$_REQUEST['email']);
    $password = mysqli_real_escape_string($conn,$_REQUEST['password']);
    $confpassword = mysqli_real_escape_string($conn,$_REQUEST['conf-pass']);

    if($confpassword != $password){
        array_push($errors, "Passwords do not match");
    }

    if(empty($name) || empty($phone) || empty($email) || empty($password)){
        array_push($errors, "All fields are required");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Enter a valid email address");
    }

    if(empty($errors)){
        // Check if email is already registered
        $stmt = $conn->prepare("SELECT email FROM users_data WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if($result->num_rows > 0){
            array_push($errors, "Email already registered");
        } else {
            // Hash password
            $password = sha1($password);
                $redPage = mysqli_real_escape_string($conn, $_REQUEST['red-page']);
                $reqPage = mysqli_real_escape_string($conn, $_REQUEST['req-page']);
            // Insert new user data
            $stmt = $conn->prepare("INSERT INTO users_data (name, phone, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $phone, $email, $password);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                // Send registration confirmation email
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'clubuckys@gmail.com'; // Your email
                $mail->Password = $emailPass; // Your email password
                $mail->SMTPSecure = 'tls'; // Use TLS
                $mail->Port = 587; // TLS port

                $mail->setFrom('clubuckys@gmail.com'); // Your email
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Registration Successful';
                $mail->Body = '
                    <p>Dear ' . $name . ',</p>
                    <p>Thank you for registering with us!</p>
                    <p>Your registered email ID is: ' . $email . '</p>
                    <p>Your password is: ' . $_REQUEST['password'] . '</p>
                    <p>Please keep this information safe and do not share it with anyone.</p>
                    <p>Best regards,<br>CluBucks Team</p>
                ';

                if ($mail->send()) {
                    $_SESSION['message'] = "Registered Successfully. You can Log In now!";
                    header('Location: '.$redPage.'?req-page='.$reqPage);
                    exit();
                } else {
                    $_SESSION['message'] = "Registration Successful, but email could not be sent. Please contact support for further assistance.";
                    header('Location: '.$redPage.'?req-page='.$reqPage);
                    exit();
                }
            } else {
                array_push($errors, "Something Went Wrong");
            }
        }
    }

    $_SESSION['errors'] = $errors;
    header('Location: index.php?req-page='.$reqPage);
    exit();
}

?>
