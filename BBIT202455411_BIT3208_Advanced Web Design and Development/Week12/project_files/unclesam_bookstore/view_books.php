<?php
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Search functionality
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if($search !== ''){
    $stmt = $conn->prepare("SELECT * FROM books WHERE title LIKE ?
                            OR author LIKE ? OR category LIKE ?
                            ORDER BY created_at DESC");
    $term = "%$search%";
    $stmt->bind_param("sss", $term, $term, $term);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = mysqli_query($conn, "SELECT * FROM books ORDER BY created_at DESC");
}
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
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h2 style="color:#e94560; font-size:1.3rem;">📚 Book Inventory</h2>
            <a href="add_book.php" class="btn" style="width:auto; padding:10px 25px; margin:0;">
                + Add New Book
            </a>
        </div>

        <!-- Search Form -->
        <form method="GET" style="margin-bottom:20px; display:flex; gap:10px; flex-wrap:wrap;">
            <input type="text" name="search"
                   placeholder="Search by title, author or category..."
                   value="<?php echo htmlspecialchars($search); ?>"
                   style="flex:1; min-width:200px; padding:12px; background:#0f3460;
                          border:1px solid rgba(233,69,96,0.3); border-radius:8px;
                          color:white; font-size:0.9rem;">
            <button type="submit" class="btn"
                    style="width:auto; padding:12px 20px; margin:0;">
                🔍 Search
            </button>
            <?php if($search !== ''): ?>
            <a href="view_books.php" class="btn"
               style="width:auto; padding:12px 20px; margin:0; background:#0f3460;
                      text-align:center; text-decoration:none;">
                ✖ Clear
            </a>
            <?php endif; ?>
        </form>

        <?php if($search !== ''): ?>
            <p style="color:#4ecca3; margin-bottom:15px; font-size:0.9rem;">
                Showing results for: "<strong><?php echo htmlspecialchars($search); ?></strong>"
            </p>
        <?php endif; ?>

        <?php if(mysqli_num_rows($result) == 0): ?>
            <p style="color:#a8b2d8; text-align:center; padding:40px 0;">
                <?php if($search !== ''): ?>
                    No books found for "<?php echo htmlspecialchars($search); ?>".
                    <a href="view_books.php" style="color:#4ecca3;">Show all books</a>
                <?php else: ?>
                    No books found. <a href="add_book.php" style="color:#4ecca3;">Add your first book</a>
                <?php endif; ?>
            </p>
        <?php else: ?>
        <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Price (KSH)</th>
                    <th>Qty</th>
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
        </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>