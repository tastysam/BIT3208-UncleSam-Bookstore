<?php
include 'db_connect.php';
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
$result = mysqli_query($conn, "SELECT * FROM books ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Showcase — Uncle Sam's Bookstore</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .showcase-body {
            display: block;
            padding-top: 90px;
            background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .showcase-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 15px;
        }

        .showcase-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .showcase-header h1 {
            color: #e94560;
            font-size: 1.6rem;
        }

        .showcase-header p {
            color: #a8b2d8;
            margin-top: 8px;
            font-size: 0.9rem;
        }

        /* CSS GRID — Mobile First (1 column default) */
        .book-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        /* Tablet — 2 columns */
        @media (min-width: 768px) {
            .book-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Laptop — 3 columns */
        @media (min-width: 1024px) {
            .book-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Desktop — 4 columns */
        @media (min-width: 1440px) {
            .book-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .book-card {
            background: rgba(22, 33, 62, 0.95);
            border: 1px solid rgba(233, 69, 96, 0.15);
            border-radius: 16px;
            padding: 25px 20px;
            transition: all 0.3s ease;
        }

        .book-card:hover {
            border-color: #e94560;
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(233, 69, 96, 0.2);
        }

        .book-icon {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 15px;
        }

        .book-title {
            color: #e94560;
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .book-author {
            color: #4ecca3;
            font-size: 0.85rem;
            margin-bottom: 10px;
        }

        .book-category {
            display: inline-block;
            padding: 3px 12px;
            background: rgba(233, 69, 96, 0.1);
            border: 1px solid rgba(233, 69, 96, 0.3);
            border-radius: 20px;
            color: #e94560;
            font-size: 0.75rem;
            margin-bottom: 12px;
        }

        .book-price {
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .book-qty {
            color: #a8b2d8;
            font-size: 0.8rem;
            margin-top: 6px;
        }

        /* Responsive image */
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="showcase-body">

<nav class="navbar">
    <div class="brand">📚 Uncle Sam's Bookstore</div>
    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="view_books.php">View Books</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="showcase-container">
    <div class="showcase-header">
        <h1>📚 Book Showcase</h1>
        <p>Responsive on all devices — mobile, tablet and desktop</p>
    </div>

    <div class="book-grid">
        <?php while($book = mysqli_fetch_assoc($result)): ?>
        <div class="book-card">
            <div class="book-icon">📖</div>
            <div class="book-title"><?php echo htmlspecialchars($book['title']); ?></div>
            <div class="book-author">by <?php echo htmlspecialchars($book['author']); ?></div>
            <div>
                <span class="book-category"><?php echo htmlspecialchars($book['category']); ?></span>
            </div>
            <div class="book-price">KSH <?php echo number_format($book['price'], 2); ?></div>
            <div class="book-qty">📦 <?php echo $book['quantity']; ?> copies in stock</div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>