<?php
session_start();

$host     = "localhost";
$username = "root";
$password = "";
$database = "unclesam_bookstore_db";

$conn = mysqli_connect("localhost", "root", "", "unclesam_bookstore_db", 3307);

if(!$conn){
    die("<p style='color:red;font-family:sans-serif;text-align:center;'>
    ❌ Connection failed: " . mysqli_connect_error() . "</p>");
}

// Session timeout — 30 minutes
$session_timeout = 1800;
if(isset($_SESSION['user_id'])){
    if(isset($_SESSION['last_activity'])){
        if((time() - $_SESSION['last_activity']) > $session_timeout){
            session_destroy();
            header("Location: login.php?error=session_expired");
            exit();
        }
    }
    $_SESSION['last_activity'] = time();
}
?>