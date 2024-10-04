<?php
// dbconnect.php
require_once '../config/db.php';

function dbConnect() {
    global $conn;
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>
