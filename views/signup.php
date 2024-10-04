<?php
// signup.php
include_once '../templates/header.php';
?>

<div class="container mt-5">
    <h2>Sign Up</h2>
    <form action="../controllers/AuthController.php" method="POST">
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?= $_GET['error']; ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="Passenger">Passenger</option>
                <option value="Manager">Manager</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <button type="submit" name="signup" class="btn btn-secondary">Sign Up</button>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>
