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

// Get the report data from the session if it exists
$report_data = isset($_SESSION['report_data']) ? $_SESSION['report_data'] : null;
$report_type = isset($_SESSION['report_type']) ? $_SESSION['report_type'] : null;

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

<?php if ($report_data): ?>
    <div class="container mt-5">
        <h3><?= ucfirst(str_replace('_', ' ', $report_type)); ?>:</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <?php if ($report_type == 'train_report'): ?>
                    <tr>
                        <th>ID</th>
                        <th>Train Name</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                    </tr>
                <?php elseif ($report_type == 'route_report'): ?>
                    <tr>
                        <th>ID</th>
                        <th>Route Name</th>
                        <th>Start Station</th>
                        <th>End Station</th>
                    </tr>
                <?php elseif ($report_type == 'booking_report'): ?>
                    <tr>
                        <th>Booking ID</th>
                        <th>Passenger Name</th>
                        <th>Train Name</th>
                        <th>Travel Date</th>
                        <th>Class</th>
                    </tr>
                <?php endif; ?>
            </thead>
            <tbody>
                <?php foreach ($report_data as $row): ?>
                    <tr>
                        <?php foreach ($row as $column): ?>
                            <td><?= htmlspecialchars($column); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php include_once '../templates/footer.php'; ?>
