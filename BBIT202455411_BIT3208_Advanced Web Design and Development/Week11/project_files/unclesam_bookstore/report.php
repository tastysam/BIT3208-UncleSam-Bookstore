<?php
include 'db_connect.php';
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit(); }

$cat_result = mysqli_query($conn,
    "SELECT category, COUNT(*) as book_count, SUM(quantity) as total_qty,
     AVG(price) as avg_price, SUM(price*quantity) as total_value
     FROM books GROUP BY category ORDER BY book_count DESC");

$all_books  = mysqli_query($conn, "SELECT * FROM books ORDER BY category, title");
$total_count= mysqli_num_rows($all_books);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Report — Uncle Sam's Bookstore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">
<nav class="navbar">
    <div class="brand">📚 Uncle Sam's Bookstore</div>
    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="view_books.php">View Books</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>
<div class="dashboard-container">
    <div class="welcome-banner" style="margin-bottom:25px;">
        <h2>📊 Dynamic Book Report</h2>
        <p>All data retrieved dynamically from MySQL using PHP mysqli queries.</p>
        <p style="color:#4ecca3; margin-top:5px; font-size:0.9rem;">
            Total Records: <strong><?php echo $total_count; ?> books</strong>
        </p>
    </div>
    <div class="table-container" style="margin-bottom:25px;">
        <h3 style="color:#e94560; margin-bottom:15px;">📂 Books by Category</h3>
        <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>Category</th><th>Books</th><th>Total Copies</th>
                    <th>Avg Price (KSH)</th><th>Category Value (KSH)</th>
                </tr>
            </thead>
            <tbody>
            <?php while($cat=mysqli_fetch_assoc($cat_result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($cat['category']); ?></td>
                    <td><?php echo $cat['book_count']; ?></td>
                    <td><?php echo $cat['total_qty']; ?></td>
                    <td>KSH <?php echo number_format($cat['avg_price'],2); ?></td>
                    <td>KSH <?php echo number_format($cat['total_value'],2); ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </div>
    <div class="table-container">
        <h3 style="color:#e94560; margin-bottom:15px;">📚 Complete Book Inventory</h3>
        <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>#</th><th>Title</th><th>Author</th><th>Category</th>
                    <th>Price</th><th>Qty</th><th>Stock Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $all_books = mysqli_query($conn,"SELECT * FROM books ORDER BY category,title");
            $count=1;
            while($book=mysqli_fetch_assoc($all_books)):
                $sv = $book['price']*$book['quantity'];
            ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['category']); ?></td>
                    <td>KSH <?php echo number_format($book['price'],2); ?></td>
                    <td><?php echo $book['quantity']; ?></td>
                    <td style="color:#4ecca3;">KSH <?php echo number_format($sv,2); ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>
</html>