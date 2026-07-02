<?php
session_start();

$host     = "localhost";
$username = "root";
$password = "";
$database = "unclesam_bookstore_db";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("<p style='color:red; font-family:sans-serif; text-align:center;'>
        ❌ Database connection failed: " . mysqli_connect_error() . "
    </p>");
}
?>