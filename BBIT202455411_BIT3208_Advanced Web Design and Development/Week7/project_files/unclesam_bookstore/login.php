<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Uncle Sam's Bookstore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <div class="logo">
        <h1>📚 Uncle Sam's</h1>
        <p>Bookstore Management System</p>
    </div>

    <?php
    if(isset($_GET['error'])){
        echo '<div class="alert alert-error">❌ Invalid username or password. Please try again.</div>';
    }
    if(isset($_GET['registered'])){
        echo '<div class="alert alert-success">✅ Account created successfully! Please login.</div>';
    }
    if(isset($_GET['logout'])){
        echo '<div class="alert alert-success">✅ You have been logged out successfully.</div>';
    }
    ?>
    <?php
    if(isset($_GET['lockout']))
        {
            $secs = intval($_GET['lockout']);
            echo "<div class='alert alert-error'>
          🔒 Too many failed attempts. Please wait {$secs} seconds before trying again.
          </div>";
          }
    ?>

    <form action="process_login.php" method="POST" onsubmit="return validateLogin()">
        <div class="form-group">
            <label>Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
        </div>

        <button type="submit" class="btn">Login →</button>
    </form>

    <div class="form-link">
        Don't have an account? <a href="register.php">Create Account</a>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>