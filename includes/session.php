<?php
// session.php
session_start();

// Start a new session or resume the existing one
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php");
    exit();
}

// Destroy session (used for logout)
function logout() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../views/login.php");
    exit();
}
?>
