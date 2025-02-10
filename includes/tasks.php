<?php
include 'db.php';

function getTasks($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function createTask($user_id, $title, $description) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO tasks (user_id, title, description) VALUES (?, ?, ?)");
    return $stmt->execute([$user_id, $title, $description]);
}

function deleteTask($task_id, $user_id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
    return $stmt->execute([$task_id, $user_id]);
}

function completeTask($task_id, $user_id) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE tasks SET status = 'completed' WHERE id = ? AND user_id = ?");
    return $stmt->execute([$task_id, $user_id]);
}
?>