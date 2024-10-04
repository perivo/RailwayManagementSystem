<?php
// profile.php
include_once '../templates/header.php';
include_once '../templates/navbar.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if name and email are set in session, provide fallback values if not
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>

<div class="container mt-5">
    <h2>Profile</h2>
    <form action="../controllers/ProfileController.php" method="POST">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name); ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email); ?>" required>
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>
