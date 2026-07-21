<?php
// ── STEP 1: Include DB connection FIRST — this creates $conn ──
include 'db_connect.php';

// ── STEP 2: Protect the page — must be logged in ──
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// ── STEP 3: Set login time if not already set ──
if(!isset($_SESSION['login_time'])){
    $_SESSION['login_time'] = date('Y-m-d H:i:s');
}

// ── STEP 4: Get session variables ──
$fullname   = $_SESSION['fullname'];
$username   = $_SESSION['username'];
$session_id = session_id();
$login_time = $_SESSION['login_time'];

// ── STEP 5: Dynamic stats — $conn is now available ──
$total_books = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) as t FROM books")
)['t'];

$total_users = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) as t FROM users")
)['t'];

$total_stock = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(quantity) as t FROM books")
)['t'];

$total_value = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(price*quantity) as t FROM books")
)['t'];
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

    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <h2>Welcome back, <?php echo htmlspecialchars($fullname); ?>! 👋</h2>
        <p>Manage your bookstore inventory from your dashboard.</p>

        <!-- Session Info (Week 9) -->
        <div style="margin-top:15px; padding:12px 16px;
                    background:rgba(78,204,163,0.08);
                    border:1px solid rgba(78,204,163,0.2);
                    border-radius:10px; font-size:0.82rem;">
            <span style="color:#4ecca3;">🔐 Session Active</span>
            &nbsp;|&nbsp;
            <span style="color:#a8b2d8;">
                Session ID:
                <strong style="color:#4ecca3;">
                    <?php echo substr($session_id, 0, 16); ?>...
                </strong>
            </span>
            &nbsp;|&nbsp;
            <span style="color:#a8b2d8;">
                Logged in:
                <strong style="color:#4ecca3;">
                    <?php echo $login_time; ?>
                </strong>
            </span>
        </div>
    </div>

    <!-- Dynamic Statistics (Week 10) -->
    <div style="display:grid;
                grid-template-columns:repeat(auto-fit, minmax(200px,1fr));
                gap:15px;
                margin-bottom:25px;">

        <div style="background:rgba(22,33,62,0.95);
                    border:1px solid rgba(233,69,96,0.2);
                    border-radius:14px; padding:20px; text-align:center;">
            <div style="font-size:2rem;">📚</div>
            <div style="color:#e94560; font-size:1.8rem;
                        font-weight:bold; margin:8px 0;">
                <?php echo $total_books; ?>
            </div>
            <div style="color:#a8b2d8; font-size:0.85rem;">Total Books</div>
        </div>

        <div style="background:rgba(22,33,62,0.95);
                    border:1px solid rgba(78,204,163,0.2);
                    border-radius:14px; padding:20px; text-align:center;">
            <div style="font-size:2rem;">👥</div>
            <div style="color:#4ecca3; font-size:1.8rem;
                        font-weight:bold; margin:8px 0;">
                <?php echo $total_users; ?>
            </div>
            <div style="color:#a8b2d8; font-size:0.85rem;">Registered Users</div>
        </div>

        <div style="background:rgba(22,33,62,0.95);
                    border:1px solid rgba(233,69,96,0.2);
                    border-radius:14px; padding:20px; text-align:center;">
            <div style="font-size:2rem;">📦</div>
            <div style="color:#e94560; font-size:1.8rem;
                        font-weight:bold; margin:8px 0;">
                <?php echo number_format($total_stock); ?>
            </div>
            <div style="color:#a8b2d8; font-size:0.85rem;">Total Stock</div>
        </div>

        <div style="background:rgba(22,33,62,0.95);
                    border:1px solid rgba(78,204,163,0.2);
                    border-radius:14px; padding:20px; text-align:center;">
            <div style="font-size:2rem;">💰</div>
            <div style="color:#4ecca3; font-size:1.8rem;
                        font-weight:bold; margin:8px 0;">
                KSH <?php echo number_format($total_value, 0); ?>
            </div>
            <div style="color:#a8b2d8; font-size:0.85rem;">Inventory Value</div>
        </div>

    </div>

    <!-- Dashboard Cards -->
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

       <a href="manage_books.php" class="dash-card">
            <div class="icon">✏️</div>
            <h3>MANAGE BOOKS</h3>
            <p>Edit or delete book records</p>
        </a>

        <a href="showcase.php" class="dash-card">
            <div class="icon">🗂️</div>
            <h3>BOOK SHOWCASE</h3>
            <p>View responsive book cards</p>
        </a>

        <a href="report.php" class="dash-card">
            <div class="icon">📊</div>
            <h3>REPORTS</h3>
            <p>View dynamic book reports</p>
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