<?php
include("../util/db.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validacija
$username_pattern = "/^[a-zA-Z0-9_]{3,16}$/";
$email_pattern = "/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/";
$password_pattern = "/(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

if (!preg_match($username_pattern, $username)) {
    echo 'Username must be 3-16 characters long and can include letters, numbers, and underscores.';
    exit();
}

if (!preg_match($email_pattern, $email)) {
    echo 'Invalid email format.';
    exit();
}

if (!preg_match($password_pattern, $password)) {
    echo 'Password must be at least 8 characters long and include both letters and numbers.';
    exit();
}

// Provjeri de li je email ili username već u korištenju
$stmt = $conn->prepare("SELECT 1 FROM users WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo 'Username or email already exists.';
    exit();
}

// Hash-iranje password-a
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Dodaj user-a u bazu podataka
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashed_password);

if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>