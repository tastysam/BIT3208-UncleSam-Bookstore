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
    <title>View Books — Uncle Sam's Bookstore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

<nav class="navbar">
    <div class="brand">📚 Uncle Sam's Bookstore</div>
    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="add_book.php">Add Book</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="dashboard-container">

    <?php
    if(isset($_GET['deleted'])){
        echo '<div class="alert alert-success">✅ Book deleted successfully.</div>';
    }
    if(isset($_GET['updated'])){
        echo '<div class="alert alert-success">✅ Book updated successfully.</div>';
    }
    ?>

    <div class="table-container">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px;">
            <h2 style="color:#e94560; font-size:1.3rem;">📚 Book Inventory</h2>
            <a href="add_book.php" class="btn" style="width:auto; padding:10px 25px; margin:0;">
                + Add New Book
            </a>
        </div>

        <?php if(mysqli_num_rows($result) == 0): ?>
            <p style="color:#a8b2d8; text-align:center; padding:40px 0;">
                No books found. <a href="add_book.php" style="color:#4ecca3;">Add your first book</a>
            </p>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Price (KSH)</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while($row = mysqli_fetch_assoc($result)):
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['author']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td>KSH <?php echo number_format($row['price'], 2); ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>
                        <a href="edit_book.php?id=<?php echo $row['id']; ?>" class="btn-edit">✏️ Edit</a>
                        <a href="delete_book.php?id=<?php echo $row['id']; ?>"
                           class="btn-delete"
                           onclick="return confirm('Are you sure you want to delete this book?')">
                           🗑️ Delete
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

</div>

</body>
</html>