<?php
// admin_dashboard.php
include_once '../templates/header.php';
include_once '../templates/navbar.php';
include_once '../templates/sidebar.php';

session_start();
if ($_SESSION['role'] !== 'Admin') {
    header("Location: home.php");
    exit();
}

?>

<div class="container mt-5">
    <h2>Admin Dashboard</h2>
    <p>Manage the entire railway system from here.</p>
    <div class="row">
        <div class="col-md-4">
            <a href="train_management.php" class="btn btn-primary">Manage Trains</a>
        </div>
        <div class="col-md-4">
            <a href="route_management.php" class="btn btn-secondary">Manage Routes</a>
        </div>
        <div class="col-md-4">
            <a href="reports.php" class="btn btn-success">View Reports</a>
        </div>
    </div>
</div>

<?php include_once '../templates/footer.php'; ?>
