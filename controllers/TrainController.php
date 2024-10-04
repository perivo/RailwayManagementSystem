<?php
// TrainController.php
require_once '../config/db.php';
require_once '../includes/functions.php';

session_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

checkLogin();  // Ensure the user is logged in

if (isset($_POST['add_train'])) {
    $train_name = sanitize($_POST['train_name']);
    $train_number = sanitize($_POST['train_number']);
    $train_type = sanitize($_POST['train_type']);
    $train_route = sanitize($_POST['train_route']); // This is the route ID selected from the dropdown

    // Insert the new train into the database
    $query = "INSERT INTO trains (train_name, train_number, train_type, route_id) 
              VALUES ('$train_name', '$train_number', '$train_type', '$train_route')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Train added successfully!";
    } else {
        $_SESSION['error'] = "Failed to add train: " . mysqli_error($conn);
    }

    // Redirect back to train management page
    header("Location: ../views/train_management.php");
    exit();
}
?>
