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
        echo '<div class="alert alert-error">❌ Invalid username or password.</div>';
    }
    if(isset($_GET['registered'])){
        echo '<div class="alert alert-success">✅ Account created! Please login.</div>';
    }
    ?>

    <form onsubmit="return validateLogin()">
        <div class="form-group">
            <label>Username</label>
            <input type="text" id="username" placeholder="Enter your username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" id="password" placeholder="Enter your password">
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