<?php
session_start(); // Start the session here
include 'includes/header.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="mb-4">Welcome to Task Scheduler</h1>
            <p class="lead">Manage your tasks efficiently and stay organized.</p>
            <?php if (isset($_SESSION['user_id'])): ?>
                <p>You are already logged in. <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a></p>
            <?php else: ?>
                <p>
                    <a href="register.php" class="btn btn-primary">Register</a>
                    <a href="login.php" class="btn btn-success">Login</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>