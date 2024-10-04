<?php
// AuthController.php
require_once '../config/db.php';
require_once '../includes/functions.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if logout is requested
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    // Unset all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to the index page
    header("Location: ../views/index.php");
    exit(); // Ensure no further code is executed after redirect
}
// Login function
if (isset($_POST['login'])) {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user && md5($password) == $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        
        if ($user['role'] == 'Admin') {
            header("Location: ../views/admin_dashboard.php");
        } else {
            header("Location: ../views/home.php");
        }
        exit();
    } else {
        echo "Invalid email or password!";
    }
}

function checkLogin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../views/login.php");
        exit();
    }
}

// Signup function
if (isset($_POST['signup'])) {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $password = md5(sanitize($_POST['password']));
    $role = 'Passenger';
    
    $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
    if (mysqli_query($conn, $query)) {
        header("Location: ../views/login.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_unset();
    session_destroy();
    header("Location: ../views/index.php");
    exit();
}
?>
