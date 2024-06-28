<?php
$hostname = "sql211.infinityfree.com";
$username = "if0_36278753";
$password = "IuR0jnT54E";
$db_name = "if0_36278753_user";
$conn = new mysqli($hostname, $username, $password,$db_name);  
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}  
