<?php
// ProfileController.php
include_once '../config/db.php';
session_start();

if (isset($_POST['update_profile'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

    $userId = $_SESSION['user_id'];

    // Check if the new email is already used by another user
    $checkEmailQuery = "SELECT id FROM users WHERE email = '$email' AND id != '$userId'";
    $result = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        // Email is already used by another user
        header("Location: ../views/profile.php?error=Email already taken by another user.");
        exit();
    }

    // Proceed with update
    if ($password) {
        $query = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id='$userId'";
    } else {
        $query = "UPDATE users SET name='$name', email='$email' WHERE id='$userId'";
    }

    if (mysqli_query($conn, $query)) {
        // Update session values
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        header("Location: ../views/profile.php?success=1");
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
