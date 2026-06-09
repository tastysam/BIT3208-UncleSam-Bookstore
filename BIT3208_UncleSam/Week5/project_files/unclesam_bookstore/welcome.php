<?php
$system_name = "Uncle Sam's Bookstore";
$developer = "Samuel Muthee Wainaina";
$reg_no = "BBIT/2024/55411";
$unit = "BIT3208";

echo "
<div style='
    font-family: Segoe UI, sans-serif;
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #a8b2d8;
'>
<div style='
    background: rgba(22,33,62,0.95);
    padding: 50px;
    border-radius: 20px;
    border: 1px solid rgba(233,69,96,0.2);
    text-align: center;
'>
    <h1 style='color:#e94560;'>📚 $system_name</h1>
    <p style='margin-top:15px;'>Developer: <strong style='color:#4ecca3;'>$developer</strong></p>
    <p>Reg No: <strong style='color:#4ecca3;'>$reg_no</strong></p>
    <p>Unit: <strong style='color:#4ecca3;'>$unit</strong></p>
</div>
</div>
";
?>