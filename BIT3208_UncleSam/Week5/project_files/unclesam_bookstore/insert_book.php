<?php
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title    = trim(mysqli_real_escape_string($conn, $_POST['title']));
    $author   = trim(mysqli_real_escape_string($conn, $_POST['author']));
    $category = trim(mysqli_real_escape_string($conn, $_POST['category']));
    $price    = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    if(empty($title) || empty($author) || empty($category)){
        header("Location: add_book.php?error=All fields are required");
        exit();
    }

    $sql = "INSERT INTO books (title, author, category, price, quantity)
            VALUES ('$title', '$author', '$category', '$price', '$quantity')";

    if(mysqli_query($conn, $sql)){
        header("Location: add_book.php?success=1");
        exit();
    } else {
        header("Location: add_book.php?error=Failed to add book. Please try again.");
        exit();
    }
}
?>