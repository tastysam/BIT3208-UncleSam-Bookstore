<?php
$username = htmlspecialchars($_GET['username']);
echo "
<div style='
    font-family: Segoe UI, sans-serif;
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
'>
<div style='
    background: rgba(22,33,62,0.95);
    padding: 50px 60px;
    border-radius: 20px;
    border: 1px solid rgba(233,69,96,0.2);
    text-align: center;
'>
    <h1 style='color:#e94560; font-family: Segoe UI;'>
        Welcome, $username! 👋
    </h1>
    <p style='color:#a8b2d8; margin-top:15px; font-family: Segoe UI;'>
        Uncle Sam's Bookstore Management System
    </p>
    <a href='user_input.php' style='
        display:inline-block;
        margin-top:25px;
        padding:12px 30px;
        background:#e94560;
        color:white;
        border-radius:10px;
        text-decoration:none;
        font-family: Segoe UI;
    '>Go Back</a>
</div>
</div>
";
?>