<?php
// RouteController.php
require_once '../config/db.php';
require_once '../includes/functions.php';

session_start();
checkLogin();  // Ensure the user is logged in

if (isset($_POST['add_route'])) {
    // Sanitize input
    $route_name = sanitize($_POST['route_name']);
    $stations = sanitize($_POST['stations']);  // Assuming stations are a comma-separated string
    
    // Insert route into the database
    $query = "INSERT INTO routes (route_name, stations) VALUES ('$route_name', '$stations')";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Route added successfully!";
        header("Location: ../views/route_management.php");
    } else {
        $_SESSION['error'] = "Error adding route: " . mysqli_error($conn);
        header("Location: ../views/route_management.php");
    }
}

// Fetch routes to populate the dropdown (used elsewhere in your views)
function getRoutes() {
    global $conn;
    $query = "SELECT * FROM routes";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
