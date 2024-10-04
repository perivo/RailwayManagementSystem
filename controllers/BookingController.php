<?php
// BookingController.php
require_once '../config/db.php';
require_once '../includes/functions.php';

session_start();
checkLogin();  // Ensure the user is logged in

// Book a train
if (isset($_POST['book_train'])) {
    $user_id = $_SESSION['user_id'];
    $train_id = sanitize($_POST['train_id']);
    $travel_date = sanitize($_POST['travel_date']);
    $class = sanitize($_POST['class']);
    
    $query = "INSERT INTO bookings (user_id, train_id, travel_date, class) VALUES ('$user_id', '$train_id', '$travel_date', '$class')";
    if (mysqli_query($conn, $query)) {
        header("Location: ../views/booking.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Cancel booking
if (isset($_POST['cancel_booking'])) {
    $id = sanitize($_POST['booking_id']);
    $query = "DELETE FROM bookings WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        header("Location: ../views/booking.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
