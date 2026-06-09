<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Uncle Sam's Bookstore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <div class="logo">
        <h1>📚 Create Account</h1>
        <p>Join Uncle Sam's Bookstore</p>
    </div>

    <?php
    if(isset($_GET['error'])){
        $error = htmlspecialchars($_GET['error']);
        echo "<div class='alert alert-error'>❌ $error</div>";
    }
    ?>

    <form action="register_process.php" method="POST" onsubmit="return validateRegister()">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name">
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" id="username" name="username" placeholder="Choose a username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" id="password" name="password"
                   placeholder="Create a password"
                   onkeyup="checkPasswordStrength()">
            <div class="strength-bar" id="strength-bar"></div>
            <div class="strength-text" id="strength-text"></div>
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password"
                   placeholder="Repeat your password">
        </div>

        <button type="submit" class="btn">Create Account →</button>
    </form>

    <div class="form-link">
        Already have an account? <a href="login.php">Login here</a>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>