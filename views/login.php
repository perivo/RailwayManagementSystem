<?php
// login.php
include_once '../templates/header.php';
?>

<div class="container mt-5">
    <h2>Login</h2>
    <form action="../controllers/AuthController.php" method="POST">
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?= $_GET['error']; ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>
