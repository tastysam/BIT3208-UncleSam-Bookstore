<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

include 'db_connect.php';

$remembered = '';
if(isset($_COOKIE['remember_user'])){
    $remembered = $_COOKIE['remember_user'];
}
?>
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

    <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-error">
            ❌ Invalid username or password. Please try again.
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['registered'])): ?>
        <div class="alert alert-success">
            ✅ Account created successfully! Please login.
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['logout'])): ?>
        <div class="alert alert-success">
            ✅ You have been logged out successfully.
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['lockout'])): ?>
        <div class="alert alert-error">
            🔒 Too many failed attempts.
            Please wait <?php echo intval($_GET['lockout']); ?> seconds.
        </div>
    <?php endif; ?>

    <form action="process_login.php" method="POST"
          onsubmit="return validateLogin()">

        <div class="form-group">
            <label>Username</label>
            <input type="text"
                   id="username"
                   name="username"
                   placeholder="Enter your username"
                   value="<?php echo htmlspecialchars($remembered); ?>">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password"
                   id="password"
                   name="password"
                   placeholder="Enter your password">
        </div>

        <div class="form-group"
             style="display:flex; align-items:center;
                    gap:10px; margin-top:-5px;">
            <input type="checkbox"
                   id="remember_me"
                   name="remember_me"
                   value="1"
                   <?php echo ($remembered !== '') ? 'checked' : ''; ?>
                   style="width:auto; accent-color:#e94560;
                          cursor:pointer;">
            <label for="remember_me"
                   style="color:#a8b2d8; font-size:0.875rem;
                          cursor:pointer; margin:0;">
                Remember Me (saves username for 30 days)
            </label>
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