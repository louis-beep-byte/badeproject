<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
<h2>Hello, <?= session()->get('username') ?></h2>
<a href="/logout">Logout</a>

<h3>Add Task</h3>
<form action="/add-task" method="post">
    <?= csrf_field() ?>
    Task: <input type="text" name="task" required>
    Due Date: <input type="date" name="due_date">
    <button type="submit">Add</button>
</form>

<h3>Your Tasks</h3>
<ul>
<?php foreach($tasks as $t): ?>
    <li><?= $t['task'] ?> - <?= $t['due_date'] ?></li>
<?php endforeach; ?>
</ul>
</body>
</html>
