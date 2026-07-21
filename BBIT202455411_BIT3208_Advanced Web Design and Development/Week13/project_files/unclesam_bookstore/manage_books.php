<?php
include 'db_connect.php';
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit(); }

// Search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
if($search !== ''){
    $stmt = $conn->prepare("SELECT * FROM books WHERE title LIKE ? OR author LIKE ? OR category LIKE ? ORDER BY title");
    $term = "%$search%";
    $stmt->bind_param("sss",$term,$term,$term);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = mysqli_query($conn,"SELECT * FROM books ORDER BY title");
}
$total = mysqli_num_rows($result);
// Reset for display
if($search !== ''){
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = mysqli_query($conn,"SELECT * FROM books ORDER BY title");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books — Uncle Sam's Bookstore</title>
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
    if(isset($_GET['deleted'])) echo '<div class="alert alert-success">✅ Book deleted successfully.</div>';
    if(isset($_GET['updated'])) echo '<div class="alert alert-success">✅ Book updated successfully.</div>';
    ?>
    <div class="welcome-banner" style="margin-bottom:20px;">
        <h2>✏️ Manage Books</h2>
        <p>Edit or delete book records. Total records: <strong style="color:#e94560;"><?php echo $total; ?></strong></p>
    </div>
    <div class="table-container">
        <form method="GET" style="margin-bottom:20px; display:flex; gap:10px; flex-wrap:wrap;">
            <input type="text" name="search"
                   placeholder="Search to manage specific books..."
                   value="<?php echo htmlspecialchars($search); ?>"
                   style="flex:1; min-width:200px; padding:12px; background:#0f3460;
                          border:1px solid rgba(233,69,96,0.3); border-radius:8px; color:white;">
            <button type="submit" class="btn" style="width:auto; padding:12px 20px; margin:0;">🔍 Search</button>
            <?php if($search !== ''): ?>
            <a href="manage_books.php" class="btn" style="width:auto; padding:12px 20px; margin:0; background:#0f3460; text-decoration:none; text-align:center;">✖ Clear</a>
            <?php endif; ?>
        </form>
        <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>#</th><th>Title</th><th>Author</th><th>Category</th>
                    <th>Price</th><th>Qty</th><th>Edit</th><th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php $count=1; while($row=mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['author']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td>KSH <?php echo number_format($row['price'],2); ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><a href="edit_book.php?id=<?php echo $row['id']; ?>" class="btn-edit">✏️ Edit</a></td>
                    <td><a href="delete_book.php?id=<?php echo $row['id']; ?>"
                           class="btn-delete"
                           onclick="return confirm('Delete this book?')">🗑️ Delete</a></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>
</html>