<?php
// reports.php
include_once '../templates/header.php';
include_once '../templates/navbar.php';
include_once '../templates/sidebar.php';

session_start();
if ($_SESSION['role'] !== 'Admin' && $_SESSION['role'] !== 'Manager') {
    header("Location: home.php");
    exit();
}

?>

<div class="container mt-5">
    <h2>Reports</h2>
    <form action="../controllers/ReportController.php" method="POST">
        <div class="form-group">
            <label>Report Type</label>
            <select name="report_type" class="form-control">
                <option value="train_report">Train Report</option>
                <option value="route_report">Route Report</option>
                <option value="booking_report">Booking Report</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>
