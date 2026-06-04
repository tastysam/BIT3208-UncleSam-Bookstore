<?php
// Database Configuration
$host     = "localhost";
$username = "root";
$password = "";
$database = "unclesam_bookstore_db";

// Create Connection
$conn = mysqli_connect($host, $username, $password, $database);

// Test Connection
if (!$conn) {
    die("
        <div style='
            font-family: Segoe UI, sans-serif;
            background: #1a1a2e;
            color: #e94560;
            text-align: center;
            padding: 50px;
            font-size: 1.2rem;
        '>
            ❌ Connection Failed: " . mysqli_connect_error() . "
        </div>
    ");
} else {
    echo "
        <div style='
            font-family: Segoe UI, sans-serif;
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            color: #4ecca3;
            text-align: center;
            padding: 50px;
            font-size: 1.2rem;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        '>
            ✅ Database Connected Successfully!<br>
            <small style='color:#a8b2d8; font-size:0.9rem; margin-top:10px; display:block;'>
                Uncle Sam's Bookstore DB is ready.
            </small>
        </div>
    ";
}
?>