<?php
session_start(); // Start the session here
include 'includes/db.php';
include 'includes/auth.php';
include 'includes/tasks.php';
include 'includes/header.php';

redirectIfNotLoggedIn();

$user_id = $_SESSION['user_id'];
$tasks = getTasks($user_id);
?>

<div class="container">
    <h1 class="my-4">Your Tasks</h1>
    <div class="row">
        <div class="col-md-8">
            <form method="POST" action="" class="task-form mb-4">
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Task Title" required>
                </div>
                <div class="mb-3">
                    <textarea name="description" class="form-control" placeholder="Task Description"></textarea>
                </div>
                <button type="submit" name="create_task" class="btn btn-primary">Add Task</button>
            </form>

            <div class="task-list">
                <?php if (!empty($tasks)): ?>
                    <?php foreach ($tasks as $task): ?>
                        <div class="task-item">
                            <h5><?= htmlspecialchars($task['title']) ?></h5>
                            <p><?= htmlspecialchars($task['description']) ?></p>
                            <small class="text-muted">Status: <?= htmlspecialchars($task['status']) ?></small>
                            <div class="task-actions">
                                <a href="dashboard.php?complete_task=<?= $task['id'] ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-check"></i> Mark Complete
                                </a>
                                <a href="dashboard.php?delete_task=<?= $task['id'] ?>" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="task-item">
                        <p>No tasks found. Create a new task!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>