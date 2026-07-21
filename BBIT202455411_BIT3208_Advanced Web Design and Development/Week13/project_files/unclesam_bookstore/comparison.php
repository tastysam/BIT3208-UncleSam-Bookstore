<?php include 'db_connect.php';
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Comparison — Uncle Sam's Bookstore</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .comp-grid { display:grid; grid-template-columns:1fr 1fr 1fr; gap:15px; margin:15px 0; }
        @media(max-width:768px){ .comp-grid { grid-template-columns:1fr; } }
        .comp-box { background:#1e1e1e; border-radius:12px; padding:18px; font-family:monospace; font-size:0.78rem; line-height:1.7; }
        .comp-label { font-family:'Segoe UI',sans-serif; font-weight:bold; font-size:0.95rem; margin-bottom:10px; }
        .kw{color:#569cd6;} .str{color:#ce9178;} .cm{color:#6a9955;} .fn{color:#dcdcaa;} .var{color:#9cdcfe;}
        .section-title { color:#e94560; font-family:'Segoe UI',sans-serif; font-size:1.1rem; font-weight:bold; margin:20px 0 10px; }
    </style>
</head>
<body class="dashboard-body">
<nav class="navbar">
    <div class="brand">📚 Uncle Sam's Bookstore</div>
    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>
<div class="dashboard-container">
    <div class="welcome-banner" style="margin-bottom:25px;">
        <h2>🔄 ASP.NET vs Java vs PHP — Comparison</h2>
        <p>The same web development concepts implemented in three different technologies.</p>
    </div>

    <p class="section-title">1. Session Management</p>
    <div class="comp-grid">
        <div>
            <div class="comp-label" style="color:#0078d4;">🔷 ASP.NET (C#)</div>
            <div class="comp-box">
                <span class="cm">// Store session</span><br>
                <span class="var">Session</span>[<span class="str">"User"</span>] = <span class="str">"Michael"</span>;<br><br>
                <span class="cm">// Read session</span><br>
                <span class="kw">string</span> user =<br>
                &nbsp;<span class="var">Session</span>[<span class="str">"User"</span>].<span class="fn">ToString</span>();<br><br>
                <span class="cm">// Destroy</span><br>
                <span class="var">Session</span>.<span class="fn">Clear</span>();<br>
                <span class="var">Session</span>.<span class="fn">Abandon</span>();
            </div>
        </div>
        <div>
            <div class="comp-label" style="color:#f89820;">☕ Java (Servlets)</div>
            <div class="comp-box">
                <span class="cm">// Store session</span><br>
                <span class="var">HttpSession</span> s =<br>
                &nbsp;request.<span class="fn">getSession</span>();<br>
                s.<span class="fn">setAttribute</span>(<span class="str">"user"</span>,<span class="str">"Michael"</span>);<br><br>
                <span class="cm">// Read session</span><br>
                <span class="var">String</span> user=(<span class="var">String</span>)<br>
                &nbsp;s.<span class="fn">getAttribute</span>(<span class="str">"user"</span>);<br><br>
                <span class="cm">// Destroy</span><br>
                s.<span class="fn">invalidate</span>();
            </div>
        </div>
        <div>
            <div class="comp-label" style="color:#e94560;">🐘 PHP (Uncle Sam's)</div>
            <div class="comp-box">
                <span class="cm">// Store session</span><br>
                <span class="var">$_SESSION</span>[<span class="str">'user_id'</span>] = <span class="var">$id</span>;<br>
                <span class="var">$_SESSION</span>[<span class="str">'username'</span>] = <span class="var">$u</span>;<br><br>
                <span class="cm">// Read session</span><br>
                <span class="var">$user</span> = <span class="var">$_SESSION</span>[<span class="str">'username'</span>];<br><br>
                <span class="cm">// Destroy</span><br>
                <span class="fn">session_destroy</span>();
            </div>
        </div>
    </div>

    <p class="section-title">2. Control Structures</p>
    <div class="comp-grid">
        <div>
            <div class="comp-label" style="color:#0078d4;">🔷 ASP.NET (C#)</div>
            <div class="comp-box">
                <span class="kw">if</span>(mark >= 50){<br>
                &nbsp;<span class="var">lblResult</span>.Text=<span class="str">"Pass"</span>;<br>
                }<span class="kw">else</span>{<br>
                &nbsp;<span class="var">lblResult</span>.Text=<span class="str">"Fail"</span>;<br>
                }<br><br>
                <span class="kw">for</span>(<span class="kw">int</span> i=1;i<=5;i++){<br>
                &nbsp;<span class="var">Response</span>.<span class="fn">Write</span>(i);<br>
                }
            </div>
        </div>
        <div>
            <div class="comp-label" style="color:#f89820;">☕ Java (Servlets)</div>
            <div class="comp-box">
                <span class="kw">if</span>(mark >= 50){<br>
                &nbsp;out.<span class="fn">println</span>(<span class="str">"Pass"</span>);<br>
                }<span class="kw">else</span>{<br>
                &nbsp;out.<span class="fn">println</span>(<span class="str">"Fail"</span>);<br>
                }<br><br>
                <span class="kw">for</span>(<span class="kw">int</span> i=1;i<=5;i++){<br>
                &nbsp;out.<span class="fn">println</span>(i);<br>
                }
            </div>
        </div>
        <div>
            <div class="comp-label" style="color:#e94560;">🐘 PHP (Uncle Sam's)</div>
            <div class="comp-box">
                <span class="kw">if</span>(<span class="var">$price</span> <= 0){<br>
                &nbsp;<span class="fn">header</span>(<span class="str">"Location: ...?error=..."</span>);<br>
                &nbsp;<span class="fn">exit</span>();<br>
                }<span class="kw">else</span>{<br>
                &nbsp;<span class="var">$stmt</span>-><span class="fn">execute</span>();<br>
                }<br><br>
                <span class="kw">while</span>(<span class="var">$row</span>=<span class="fn">mysqli_fetch_assoc</span>(<span class="var">$r</span>)){<br>
                &nbsp;<span class="kw">echo</span> <span class="var">$row</span>[<span class="str">'title'</span>];<br>
                }
            </div>
        </div>
    </div>

    <p class="section-title">3. Database Connection</p>
    <div class="comp-grid">
        <div>
            <div class="comp-label" style="color:#0078d4;">🔷 ASP.NET (C#)</div>
            <div class="comp-box">
                <span class="var">SqlConnection</span> con=<span class="kw">new</span><br>
                <span class="var">SqlConnection</span>(<span class="str">"Server=.;Database=StudentDB;Integrated Security=True"</span>);<br>
                con.<span class="fn">Open</span>();
            </div>
        </div>
        <div>
            <div class="comp-label" style="color:#f89820;">☕ Java (JDBC)</div>
            <div class="comp-box">
                <span class="var">Connection</span> conn=<br>
                <span class="var">DriverManager</span>.<span class="fn">getConnection</span>(<br>
                <span class="str">"jdbc:mysql://localhost:3306/db"</span>,<br>
                <span class="str">"root"</span>,<span class="str">"password"</span>);
            </div>
        </div>
        <div>
            <div class="comp-label" style="color:#e94560;">🐘 PHP (Uncle Sam's)</div>
            <div class="comp-box">
                <span class="var">$conn</span>=<span class="fn">mysqli_connect</span>(<br>
                &nbsp;<span class="str">"localhost"</span>,<br>
                &nbsp;<span class="str">"root"</span>,<br>
                &nbsp;<span class="str">""</span>,<br>
                &nbsp;<span class="str">"unclesam_bookstore_db"</span>);
            </div>
        </div>
    </div>
</div>
</body>
</html>