<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #6c63ff, #48c6ef);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            overflow: hidden;
        }
        .welcome-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(14px);
            border-radius: 15px;
            padding: 40px 50px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            max-width: 500px;
            width: 90%;
            animation: fadeIn 0.8s ease-in-out;
        }
        .welcome-card h1 {
            font-size: 2.3rem;
            font-weight: 700;
        }
        .welcome-card p {
            font-size: 1.1rem;
            margin-top: 10px;
            color: #f1f1f1;
        }
        .btn-custom {
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 12px 0;
            width: 48%;
            color: #fff;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .btn-login {
            background: linear-gradient(45deg, #6c63ff, #847bff);
            box-shadow: 0 4px 12px rgba(108, 99, 255, 0.4);
        }
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(108, 99, 255, 0.5);
        }
        .btn-register {
            background: linear-gradient(45deg, #48c6ef, #6fd0f6);
            box-shadow: 0 4px 12px rgba(72, 198, 239, 0.4);
        }
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(72, 198, 239, 0.5);
        }
        footer {
            position: fixed;
            bottom: 10px;
            text-align: center;
            width: 100%;
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.9rem;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="welcome-card">
        <h1>Welcome to Your To-Do List!</h1>
        <p>Organize your day, track your goals, and stay productive.</p>

        <div class="d-flex justify-content-between mt-4">
            <a href="<?= base_url('login') ?>" class="btn btn-custom btn-login">Login</a>
            <a href="<?= base_url('register') ?>" class="btn btn-custom btn-register">Register</a>
        </div>
    </div>

    <footer>
        &copy; <?= date('Y'); ?> To-Do List App | Stay Organized 🌟
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
