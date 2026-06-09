<?php
include 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $fullname         = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
    $email            = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $username         = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate fields
    if(empty($fullname) || empty($email) || empty($username) || empty($password)){
        header("Location: register.php?error=All fields are required");
        exit();
    }

    if($password !== $confirm_password){
        header("Location: register.php?error=Passwords do not match");
        exit();
    }

    if(strlen($password) < 6){
        header("Location: register.php?error=Password must be at least 6 characters");
        exit();
    }

    // Check if username already exists
    $check = mysqli_query($conn, "SELECT id FROM users WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($check) > 0){
        header("Location: register.php?error=Username or email already exists");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO users (fullname, email, username, password)
            VALUES ('$fullname', '$email', '$username', '$hashed_password')";

    if(mysqli_query($conn, $sql)){
        header("Location: login.php?registered=1");
        exit();
    } else {
        header("Location: register.php?error=Registration failed. Please try again.");
        exit();
    }
}
?>