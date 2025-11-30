<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h2>Welcome, <?= session('username') ?>!</h2>

    <h3>Add a New Task</h3>
    <form method="post" action="/todolist/add">
        <input type="text" name="title" placeholder="Task title" required>
        <textarea name="description" placeholder="Task description"></textarea>
        <button type="submit">Add Task</button>
    </form>

    <h3>Your Tasks</h3>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= esc($task['title']) ?> — <?= esc($task['status']) ?>
                <?php if ($task['status'] === 'pending'): ?>
                    <a href="/todolist/complete/<?= $task['id'] ?>">✅ Complete</a>
                <?php endif; ?>
                <a href="/todolist/delete/<?= $task['id'] ?>">🗑️ Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="/logout">Logout</a></p>
</body>
</html>
