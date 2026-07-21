<?php
include 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        header("Location: login.php?error=1");
        exit();
    }

    // Initialize login attempt tracking
    if(!isset($_SESSION['login_attempts'])){
        $_SESSION['login_attempts'] = 0;
    }
    if(!isset($_SESSION['lockout_time'])){
        $_SESSION['lockout_time'] = 0;
    }

    // Check brute force lockout
    if($_SESSION['login_attempts'] >= 3){
        $elapsed = time() - $_SESSION['lockout_time'];
        if($elapsed < 60){
            $remaining = 60 - $elapsed;
            header("Location: login.php?lockout=$remaining");
            exit();
        } else {
            // Reset after 60 seconds
            $_SESSION['login_attempts'] = 0;
        }
    }

    // Prepared statement - prevents SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            // Success - reset attempts
            $_SESSION['login_attempts'] = 0;
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            header("Location: dashboard.php");
            exit();
            // Handle Remember Me cookie
            if(isset($_POST['remember_me']) && $_POST['remember_me'] == '1'){
                setcookie('remember_user', $username, time() + (30 * 24 * 60 * 60), '/');
            } else {
    setcookie('remember_user', '', time() - 3600, '/');
}
        } else {
            // Wrong password - increment attempts
            $_SESSION['login_attempts']++;
            $_SESSION['lockout_time'] = time();
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        $_SESSION['login_attempts']++;
        $_SESSION['lockout_time'] = time();
        header("Location: login.php?error=1");
        exit();
    }
}
?>