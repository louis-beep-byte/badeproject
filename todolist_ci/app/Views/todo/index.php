<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #48c6ef, #6c63ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .todo-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(14px);
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 600px;
            color: #fff;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        h2 {
            font-weight: 700;
        }
        .form-control {
            background: rgba(255,255,255,0.15);
            border: none;
            color: #fff;
            border-radius: 8px;
            padding: 10px 12px;
        }
        .form-control::placeholder {
            color: rgba(255,255,255,0.8);
        }
        .btn-primary, .btn-success, .btn-danger {
            font-weight: 600;
        }
        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .task-details {
            line-height: 1.2;
        }
        .alert {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="todo-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Hello, <?= esc($username) ?>! 👋</h2>
        <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
    </div>

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Add New Task -->
    <form action="<?= base_url('todolist/add') ?>" method="POST" class="mb-4">
        <div class="input-group">
            <input type="text" name="task" class="form-control" placeholder="Enter new task..." required>
            <input type="date" name="due_date" class="form-control" required>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>

    <!-- Task List -->
    <ul class="list-group">
        <?php if (!empty($tasks)): ?>
            <?php foreach($tasks as $task): ?>
                <li class="list-group-item task-item">
                    <div class="task-details">
                        <strong><?= esc($task['task']) ?></strong><br>
                        <small>Due: <?= esc($task['due_date']) ?> | Status: <?= esc($task['status']) ?></small>
                    </div>
                    <div>
                        <?php if ($task['status'] !== 'Completed'): ?>
                            <a href="<?= base_url('todolist/complete/' . $task['id']) ?>" class="btn btn-success btn-sm">✔</a>
                        <?php endif; ?>
                        <a href="<?= base_url('todolist/delete/' . $task['id']) ?>" class="btn btn-danger btn-sm">🗑</a>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item text-center text-muted">No tasks found.</li>
        <?php endif; ?>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
