<?php
// functions.php

// Function to sanitize input
function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Function to fetch user by ID
function getUserById($id) {
    global $conn;
    $id = sanitize($id);
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// Function to fetch all trains
function getAllTrains() {
    global $conn;
    $query = "SELECT * FROM trains";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
