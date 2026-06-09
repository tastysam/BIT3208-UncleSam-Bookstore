<?php
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book — Uncle Sam's Bookstore</title>
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
    <div style="max-width:550px; margin:0 auto;">

        <?php
        if(isset($_GET['success'])){
            echo '<div class="alert alert-success">✅ Book added successfully!</div>';
        }
        if(isset($_GET['error'])){
            echo '<div class="alert alert-error">❌ ' . htmlspecialchars($_GET['error']) . '</div>';
        }
        ?>

        <div class="table-container">
            <div class="logo" style="margin-bottom:25px;">
                <h1>📖 Add New Book</h1>
                <p>Enter book details below</p>
            </div>

            <form action="insert_book.php" method="POST">
                <div class="form-group">
                    <label>Book Title</label>
                    <input type="text" name="title" placeholder="Enter book title" required>
                </div>

                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" placeholder="Enter author name" required>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" placeholder="e.g. Programming, Fiction, Science" required>
                </div>

                <div class="form-group">
                    <label>Price (KSH)</label>
                    <input type="number" name="price" placeholder="e.g. 1200" step="0.01" min="0" required>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" placeholder="e.g. 15" min="0" required>
                </div>

                <button type="submit" class="btn">Add Book →</button>
            </form>

            <div class="form-link" style="margin-top:15px;">
                <a href="view_books.php">← View All Books</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>