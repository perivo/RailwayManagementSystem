<?php
// booking.php
include_once '../templates/header.php';
include_once '../templates/navbar.php';

session_start();
if ($_SESSION['role'] !== 'Passenger') {
    header("Location: home.php");
    exit();
}

?>

<div class="container mt-5">
    <h2>Book a Train Ticket</h2>
    <form action="../controllers/BookingController.php" method="POST">
        <div class="form-group">
            <label>Train</label>
            <select name="train_id" class="form-control" required>
                <!-- Populate train options from the database -->
            </select>
        </div>
        <div class="form-group">
            <label>Travel Date</label>
            <input type="date" name="travel_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class" class="form-control" required>
                <option value="Economy">Economy</option>
                <option value="Business">Business</option>
            </select>
        </div>
        <button type="submit" name="book_ticket" class="btn btn-primary">Book Ticket</button>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>
