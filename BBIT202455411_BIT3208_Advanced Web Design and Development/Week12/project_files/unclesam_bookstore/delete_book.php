<?php
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$id  = intval($_GET['id']);
$sql = "DELETE FROM books WHERE id=$id";

if(mysqli_query($conn, $sql)){
    header("Location: view_books.php?deleted=1");
    exit();
} else {
    header("Location: view_books.php?error=Delete failed");
    exit();
}
?>