<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | To-Do List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #667eea, #764ba2);
        font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        width: 100%;
        max-width: 400px;
        padding: 40px 30px;
        text-align: center;
        position: relative;
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(20px);}
        to {opacity: 1; transform: translateY(0);}
    }

    .login-card h2 {
        margin-bottom: 10px;
        color: #333;
        font-weight: 700;
    }

    .login-card .subtitle {
        font-size: 0.95rem;
        color: #666;
        margin-bottom: 30px;
    }

    .login-card .form-control {
        border-radius: 12px;
        padding: 12px;
    }

    .btn-login {
        width: 100%;
        padding: 12px;
        border-radius: 12px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        color: #fff;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102,126,234,0.4);
    }

    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 25px 0;
        color: #999;
        font-size: 0.9rem;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #ddd;
    }

    .divider span {
        padding: 0 10px;
    }

    .register-link {
        display: inline-block;
        margin-top: 10px;
        color: #667eea;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }

    .register-link:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 20px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 25px rgba(102,126,234,0.3);
    }

    .icon-wrapper svg {
        width: 40px;
        height: 40px;
        stroke: white;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .alert {
        font-size: 0.85rem;
        border-radius: 10px;
    }

</style>
</head>
<body>

<div class="login-card">
    <div class="icon-wrapper">
        <svg viewBox="0 0 24 24">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
    </div>

    <h2>Welcome Back!</h2>
    <p class="subtitle">Sign in to your account</p>

    <!-- Flash success -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <!-- Validation errors -->
    <?php if(isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <!-- Error messages -->
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= esc($error) ?></div>
    <?php endif; ?>

    <form action="<?= base_url('login') ?>" method="post" novalidate>
        <?= csrf_field() ?>
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        </div>
        <div class="mb-4">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn-login">Sign In</button>
    </form>

    <div class="divider"><span>New here?</span></div>
    <a href="<?= base_url('register') ?>" class="register-link">Create an Account</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
