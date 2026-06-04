<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uncle Sam's Bookstore</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .welcome-box {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 60px 80px;
            text-align: center;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.3);
        }

        .welcome-box h1 {
            color: #e94560;
            font-size: 2.5rem;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .welcome-box p {
            color: #a8b2d8;
            font-size: 1.1rem;
            margin-top: 15px;
        }

        .welcome-box span {
            color: #e94560;
            font-weight: bold;
        }

        .badge {
            display: inline-block;
            margin-top: 25px;
            padding: 8px 20px;
            background: #e94560;
            color: white;
            border-radius: 50px;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<div class="welcome-box">
    <h1>📚 Uncle Sam's Bookstore</h1>
    <p>Welcome to the <span>Bookstore Management System</span></p>
    <p>Developed by: <span>Samuel Muthee Wainaina</span></p>
    <p>Reg No: <span>BBIT/2024/55411</span></p>
    <div class="badge">BIT3208 — Advanced Web Design & Development</div>
</div>

<?php
    $message = "Hello World! Your PHP server is working perfectly.";
    echo "<p style='color:#a8b2d8; margin-top:20px; text-align:center;'>$message</p>";
?>

</body>
</html>