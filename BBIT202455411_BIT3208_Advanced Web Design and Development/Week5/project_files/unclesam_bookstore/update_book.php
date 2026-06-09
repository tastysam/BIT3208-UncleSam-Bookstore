<?php
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id       = intval($_POST['id']);
    $title    = trim(mysqli_real_escape_string($conn, $_POST['title']));
    $author   = trim(mysqli_real_escape_string($conn, $_POST['author']));
    $category = trim(mysqli_real_escape_string($conn, $_POST['category']));
    $price    = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    $sql = "UPDATE books
            SET title='$title', author='$author', category='$category',
                price='$price', quantity='$quantity'
            WHERE id=$id";

    if(mysqli_query($conn, $sql)){
        header("Location: view_books.php?updated=1");
        exit();
    } else {
        header("Location: edit_book.php?id=$id&error=Update failed");
        exit();
    }
}
?>