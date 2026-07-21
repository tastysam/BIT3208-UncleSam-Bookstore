<?php
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Store login time in session if not already stored
if(!isset($_SESSION['login_time'])){
    $_SESSION['login_time'] = date('Y-m-d H:i:s');
}

$fullname   = $_SESSION['fullname'];
$username   = $_SESSION['username'];
$session_id = session_id();
$login_time = $_SESSION['login_time'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Uncle Sam's Bookstore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

<nav class="navbar">
    <div class="brand">📚 Uncle Sam's Bookstore</div>
    <div class="nav-links">
        <span style="color:#4ecca3; margin-right:15px;">
            👤 <?php echo htmlspecialchars($fullname); ?>
        </span>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="dashboard-container">

    <div class="welcome-banner">
        <h2>Welcome back, <?php echo htmlspecialchars($fullname); ?>! 👋</h2>
        <p>Manage your bookstore inventory from your dashboard.</p>

        <!-- Session Information (Week 9) -->
        <div style="margin-top:15px; padding:12px 16px;
                    background:rgba(78,204,163,0.08);
                    border:1px solid rgba(78,204,163,0.2);
                    border-radius:10px; font-size:0.82rem;">
            <span style="color:#4ecca3;">🔐 Session Active</span> &nbsp;|&nbsp;
            <span style="color:#a8b2d8;">
                Session ID: <strong style="color:#4ecca3;">
                <?php echo substr($session_id, 0, 16); ?>...
                </strong>
            </span> &nbsp;|&nbsp;
            <span style="color:#a8b2d8;">
                Logged in: <strong style="color:#4ecca3;">
                <?php echo $login_time; ?>
                </strong>
            </span>
        </div>
    </div>

    <div class="cards-grid">
        <a href="add_book.php" class="dash-card">
            <div class="icon">📖</div>
            <h3>ADD BOOK</h3>
            <p>Add a new book to inventory</p>
        </a>

        <a href="view_books.php" class="dash-card">
            <div class="icon">👁️</div>
            <h3>VIEW BOOKS</h3>
            <p>Browse all books in stock</p>
        </a>

        <a href="showcase.php" class="dash-card">
            <div class="icon">🗂️</div>
            <h3>BOOK SHOWCASE</h3>
            <p>View responsive book cards</p>
        </a>

        <a href="logout.php" class="dash-card">
            <div class="icon">🚪</div>
            <h3>LOGOUT</h3>
            <p>Sign out of your account</p>
        </a>
    </div>

</div>
</body>
</html>