<?php
// train_management.php
include_once '../templates/header.php';
include_once '../templates/navbar.php';
include_once '../templates/sidebar.php';
include_once '../config/db.php'; // Include database connection

session_start();
if ($_SESSION['role'] !== 'Admin' && $_SESSION['role'] !== 'Manager') {
    header("Location: home.php");
    exit();
}

// Fetch train routes from the database
$query = "SELECT id, route_name FROM routes";
$result = mysqli_query($conn, $query);
$routes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container mt-5">
    <h2>Manage Trains</h2>
    <form action="../controllers/TrainController.php" method="POST">
        <div class="form-group">
            <label>Train Name</label>
            <input type="text" name="train_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Train Number</label>
            <input type="text" name="train_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Train Type</label>
            <input type="text" name="train_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Train Route</label>
            <select name="train_route" class="form-control" required>
                <option value="">Select Route</option>
                <?php foreach ($routes as $route): ?>
                    <option value="<?= $route['id']; ?>"><?= htmlspecialchars($route['route_name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="add_train" class="btn btn-primary">Add Train</button>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>
