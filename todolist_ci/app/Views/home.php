<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home | To-Do List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { 
    background: linear-gradient(135deg, #6c63ff, #48c6ef);
    height:100vh; display:flex; align-items:center; justify-content:center;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.home-card {
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(14px);
    border-radius:15px; padding:50px;
    text-align:center; color:#fff; max-width:400px;
}
.home-card h1 { margin-bottom:25px; font-weight:700; }
.home-card a { margin:10px; display:inline-block; padding:12px 25px; border-radius:10px; text-decoration:none; font-weight:600; color:#fff; }
.home-card a.login { background: #6c63ff; }
.home-card a.register { background:#48c6ef; }
.home-card a:hover { opacity:0.85; }
</style>
</head>
<body>
<div class="home-card">
    <h1>Welcome to To-Do List App</h1>
    <a href="<?= base_url('login') ?>" class="login">Login</a>
    <a href="<?= base_url('register') ?>" class="register">Register</a>
</div>
</body>
</html>
