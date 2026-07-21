<?php
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$id     = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
$book   = mysqli_fetch_assoc($result);

if(!$book){
    header("Location: view_books.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book — Uncle Sam's Bookstore</title>
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
        <div class="table-container">
            <div class="logo" style="margin-bottom:25px;">
                <h1>✏️ Edit Book</h1>
                <p>Update the book details below</p>
            </div>

            <form action="update_book.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

                <div class="form-group">
                    <label>Book Title</label>
                    <input type="text" name="title"
                           value="<?php echo htmlspecialchars($book['title']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author"
                           value="<?php echo htmlspecialchars($book['author']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category"
                           value="<?php echo htmlspecialchars($book['category']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Price (KSH)</label>
                    <input type="number" name="price"
                           value="<?php echo $book['price']; ?>" step="0.01" min="0" required>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity"
                           value="<?php echo $book['quantity']; ?>" min="0" required>
                </div>

                <button type="submit" class="btn">Update Book →</button>
            </form>

            <div class="form-link" style="margin-top:15px;">
                <a href="view_books.php">← Cancel and Go Back</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>