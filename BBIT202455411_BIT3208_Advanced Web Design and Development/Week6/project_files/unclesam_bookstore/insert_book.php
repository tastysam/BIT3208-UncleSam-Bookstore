<?php
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title    = trim($_POST['title']);
    $author   = trim($_POST['author']);
    $category = trim($_POST['category']);
    $price    = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    // Server-side validation
    if(empty($title) || empty($author) || empty($category)){
        header("Location: add_book.php?error=All fields are required");
        exit();
    }

    if(strlen($title) < 2){
        header("Location: add_book.php?error=Book title is too short");
        exit();
    }

    if($price <= 0){
        header("Location: add_book.php?error=Price must be greater than zero");
        exit();
    }

    if($quantity < 0){
        header("Location: add_book.php?error=Quantity cannot be negative");
        exit();
    }

    // Prepared statement - prevents SQL injection
    $stmt = $conn->prepare("INSERT INTO books (title, author, category, price, quantity)
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdi", $title, $author, $category, $price, $quantity);

    if($stmt->execute()){
        header("Location: add_book.php?success=1");
        exit();
    } else {
        header("Location: add_book.php?error=Failed to add book. Please try again.");
        exit();
    }
}
?>