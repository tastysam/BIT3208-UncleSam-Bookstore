<?php
include 'db_connect.php';

// Protect this page
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$fullname = $_SESSION['fullname'];
$username = $_SESSION['username'];
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
        <span style="color:#4ecca3; margin-right:15px;">👤 <?php echo htmlspecialchars($fullname); ?></span>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="dashboard-container">

    <div class="welcome-banner">
        <h2>Welcome back, <?php echo htmlspecialchars($fullname); ?>! 👋</h2>
        <p>Manage your bookstore inventory from your dashboard.</p>
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

        <a href="view_books.php" class="dash-card">
            <div class="icon">✏️</div>
            <h3>MANAGE BOOKS</h3>
            <p>Edit or delete book records</p>
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