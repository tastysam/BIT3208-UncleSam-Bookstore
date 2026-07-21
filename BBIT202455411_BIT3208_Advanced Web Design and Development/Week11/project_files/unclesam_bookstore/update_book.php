<?php
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id       = intval($_POST['id']);
    $title    = trim($_POST['title']);
    $author   = trim($_POST['author']);
    $category = trim($_POST['category']);
    $price    = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    if(empty($title) || empty($author) || empty($category)){
        header("Location: edit_book.php?id=$id&error=All fields are required");
        exit();
    }

    if($price <= 0){
        header("Location: edit_book.php?id=$id&error=Price must be greater than zero");
        exit();
    }

    // Prepared statement - prevents SQL injection
    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, category=?, price=?, quantity=?
                            WHERE id=?");
    $stmt->bind_param("sssdii", $title, $author, $category, $price, $quantity, $id);

    if($stmt->execute()){
        header("Location: view_books.php?updated=1");
        exit();
    } else {
        header("Location: edit_book.php?id=$id&error=Update failed");
        exit();
    }
}
?>