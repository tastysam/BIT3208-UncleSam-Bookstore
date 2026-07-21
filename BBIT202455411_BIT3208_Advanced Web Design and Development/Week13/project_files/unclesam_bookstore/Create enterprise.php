<?php include 'db_connect.php';
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Concepts — Uncle Sam's Bookstore</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .ent-card { background:rgba(22,33,62,0.95); border:1px solid rgba(233,69,96,0.15); border-radius:14px; padding:22px; margin-bottom:18px; font-family:'Segoe UI',sans-serif; }
        .ent-title { color:#e94560; font-size:1rem; font-weight:bold; margin-bottom:8px; }
        .ent-desc { color:#a8b2d8; font-size:0.875rem; line-height:1.6; }
        .ent-badge { display:inline-block; padding:3px 12px; background:rgba(233,69,96,0.1); border:1px solid rgba(233,69,96,0.3); border-radius:20px; color:#e94560; font-size:0.75rem; margin-bottom:10px; }
        .tech-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:15px; }
        .ldap-flow { background:#1e1e1e; border-radius:10px; padding:18px; font-family:monospace; font-size:0.82rem; color:#4ecca3; line-height:2; }
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
        <h2>🏢 Enterprise Web Technologies</h2>
        <p>How Uncle Sam's Bookstore relates to enterprise-level web concepts.</p>
    </div>

    <div class="tech-grid">
        <div class="ent-card">
            <div class="ent-badge">COM</div>
            <div class="ent-title">Component Object Model</div>
            <div class="ent-desc">COM enables Microsoft applications to share components. Uncle Sam's Bookstore could integrate with Microsoft Excel to export book inventory reports using COM components, eliminating manual data entry.</div>
        </div>
        <div class="ent-card">
            <div class="ent-badge">CORBA</div>
            <div class="ent-title">Common Object Request Broker</div>
            <div class="ent-desc">CORBA allows applications in different languages to communicate. A university bookstore could use CORBA to connect a Java finance system with a PHP inventory system like Uncle Sam's Bookstore.</div>
        </div>
        <div class="ent-card">
            <div class="ent-badge">RMI</div>
            <div class="ent-title">Java Remote Method Invocation</div>
            <div class="ent-desc">RMI enables Java-to-Java communication across computers. A campus with multiple branches could use RMI to retrieve Uncle Sam's Bookstore inventory from a central server.</div>
        </div>
        <div class="ent-card">
            <div class="ent-badge">LDAP</div>
            <div class="ent-title">Lightweight Directory Access Protocol</div>
            <div class="ent-desc">LDAP provides centralized authentication. Instead of storing usernames in MySQL, Uncle Sam's Bookstore could verify staff credentials against a university-wide LDAP directory for single sign-on.</div>
        </div>
        <div class="ent-card">
            <div class="ent-badge">Search Engine</div>
            <div class="ent-title">Elasticsearch / Search Integration</div>
            <div class="ent-desc">Elasticsearch enables fast full-text search across millions of records. Uncle Sam's Bookstore uses PHP mysqli LIKE queries for search — Elasticsearch would improve this for large-scale catalogs with thousands of books.</div>
        </div>
        <div class="ent-card">
            <div class="ent-badge">Current System</div>
            <div class="ent-title">Uncle Sam's Authentication vs LDAP</div>
            <div class="ent-desc">Currently the system authenticates users against the local MySQL users table. An LDAP upgrade would centralize authentication, allowing the same credentials to work across multiple university systems.</div>
        </div>
    </div>

    <div class="welcome-banner" style="margin-top:25px; margin-bottom:20px;">
        <h2>🔐 Simulated LDAP Authentication Flow</h2>
        <p>How LDAP authentication would work in Uncle Sam's Bookstore:</p>
    </div>
    <div class="ldap-flow">
        User Opens Uncle Sam's Bookstore Login Page<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↓<br>
        Enters University Username and Password<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↓<br>
        PHP Application Sends Credentials to LDAP Server<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↓<br>
        LDAP Server (ldap://university.ac.ke:389) Verifies Credentials<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↓<br>
        Authentication Successful → PHP Creates $_SESSION<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↓<br>
        User Accesses Dashboard<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↓<br>
        Logout → session_destroy() → LDAP Session Closed<br>
        <br>
        Current Implementation (MySQL):<br>
        SELECT * FROM users WHERE username=? → password_verify()<br>
        <br>
        LDAP Equivalent (PHP LDAP Extension):<br>
        $ldap = ldap_connect("ldap://university.ac.ke");<br>
        ldap_bind($ldap, "uid=$username,ou=users,dc=university,dc=ac,dc=ke", $password);
    </div>

    <?php
    // Live search demonstration
    $search_demo = mysqli_query($conn, "SELECT * FROM books WHERE title LIKE '%a%' LIMIT 5");
    ?>
    <div class="welcome-banner" style="margin-top:25px;">
        <h2>🔍 Search Engine Demonstration</h2>
        <p>Live search results — PHP mysqli LIKE query (Elasticsearch equivalent for small datasets):</p>
        <p style="color:#a8b2d8; font-size:0.85rem; margin-top:8px;">
            Query: <code style="color:#4ecca3;">SELECT * FROM books WHERE title LIKE '%a%'</code>
        </p>
    </div>
    <div class="table-container">
        <div style="overflow-x:auto;">
        <table>
            <thead><tr><th>Title</th><th>Author</th><th>Category</th><th>Price</th></tr></thead>
            <tbody>
            <?php while($r=mysqli_fetch_assoc($search_demo)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($r['title']); ?></td>
                    <td><?php echo htmlspecialchars($r['author']); ?></td>
                    <td><?php echo htmlspecialchars($r['category']); ?></td>
                    <td>KSH <?php echo number_format($r['price'],2); ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>
</html>