<?php
// home.php
include_once '../templates/header.php';
include_once '../templates/navbar.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<div class="container mt-5">
    <h1>Welcome, <?= $_SESSION['role']; ?>!</h1>
    <p>Manage your bookings, view schedules, and more.</p>

    <div class="row">
        <!-- Admin-Specific Cards -->
        <?php if ($_SESSION['role'] === 'Admin'): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Admin Dashboard</h5>
                        <p class="card-text">Access the full admin dashboard with management tools.</p>
                        <a href="admin_dashboard.php" class="btn btn-primary">Go to Admin Dashboard</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Train Management</h5>
                        <p class="card-text">Add, edit, or remove train schedules and routes.</p>
                        <a href="train_management.php" class="btn btn-secondary">Manage Trains</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Route Management</h5>
                        <p class="card-text">Manage and update train routes across various stations.</p>
                        <a href="route_management.php" class="btn btn-secondary">Manage Routes</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">View Reports</h5>
                        <p class="card-text">Generate and view reports of bookings, trains, and more.</p>
                        <a href="reports.php" class="btn btn-secondary">View Reports</a>
                    </div>
                </div>
            </div>

        <!-- Manager-Specific Cards -->
        <?php elseif ($_SESSION['role'] === 'Manager'): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Train Management</h5>
                        <p class="card-text">Manage train schedules and availability.</p>
                        <a href="train_management.php" class="btn btn-secondary">Manage Trains</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Booking Management</h5>
                        <p class="card-text">Review and manage passenger bookings.</p>
                        <a href="booking.php" class="btn btn-secondary">Manage Bookings</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Reports</h5>
                        <p class="card-text">View booking and train operation reports.</p>
                        <a href="reports.php" class="btn btn-secondary">View Reports</a>
                    </div>
                </div>
            </div>

        <!-- Passenger-Specific Cards -->
        <?php else: ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Book a Train Ticket</h5>
                        <p class="card-text">Find and book a train for your next journey.</p>
                        <a href="booking.php" class="btn btn-secondary">Book a Ticket</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">My Bookings</h5>
                        <p class="card-text">View and manage your current and past bookings.</p>
                        <a href="booking.php" class="btn btn-secondary">View My Bookings</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">Update your personal information and preferences.</p>
                        <a href="profile.php" class="btn btn-secondary">Update Profile</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include_once '../templates/footer.php'; ?>
