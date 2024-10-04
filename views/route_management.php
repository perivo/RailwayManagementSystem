<?php
// route_management.php
include_once '../templates/header.php';
include_once '../templates/navbar.php';
include_once '../templates/sidebar.php';
require_once '../includes/functions.php'; // Ensure this is included only once

session_start();
if ($_SESSION['role'] !== 'Admin' && $_SESSION['role'] !== 'Manager') {
    header("Location: home.php");
    exit();
}
?>

<!-- Rest of the HTML and form code -->


<div class="container mt-5">
    <h2>Manage Routes</h2>
    <form action="../controllers/RouteController.php" method="POST">
        <div class="form-group">
            <label>Route Name</label>
            <input type="text" name="route_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Stations</label>
            <textarea name="stations" class="form-control" required></textarea>
        </div>
        <button type="submit" name="add_route" class="btn btn-primary">Add Route</button>
    </form>

    <h3 class="mt-5">Available Routes</h3>
    <div class="form-group">
        <label>Select Route</label>
        <select class="form-control">
            <?php foreach ($routes as $route): ?>
                <option value="<?= $route['id']; ?>"><?= $route['route_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<?php include_once '../templates/footer.php'; ?>
