<?php 
session_start();

require_once 'database-login.php';
if(isset($_REQUEST['loginBtn']))
{
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $redPage = $_POST['red-page'];

    $errors = [];

    if($email == '' OR $password == ''){
        array_push($errors, "All fields are mandetory");
    }

    if($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email is not valid");
    }
    
    if(count($errors) > 0)
    {
        $_SESSION['errors'] = $errors;
        header('Location: ../login-system/index.php?req-page='.$redPage);
        exit();
    }
    $password = sha1($password);
    $userQuery = "SELECT * FROM users_data WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $userQuery);
    if($result){
        $row = $result->fetch_assoc();
        if(mysqli_num_rows($result) == 1){

            $_SESSION['loggedInStatus'] = true;
            $_SESSION['message'] = "Logged In Successfully!";
            $_SESSION['user_id'] = $row['user_id'];
            echo $_REQUEST['red-page'];
            header("Location: ".$redPage);
            exit();
        }else{

            array_push($errors, "Invalid Email or Password!");
            $_SESSION['errors'] = $errors;
        header('Location: ../login-system/index.php?req-page='.$redPage);
            exit();
        }
    }else{
        array_push($errors, "Something Went Wrong!");
        $_SESSION['errors'] = $errors;
        var_dump($_SESSION['errors']);
        header('Location: ../login-system/index.php?req-page='.$redPage);
        exit();
    }

}
?>