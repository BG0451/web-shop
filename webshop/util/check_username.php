<?php
include('db.php');

$username = $_POST['username'];

// Provjera username-a u bazi
$stmt = $conn->prepare("SELECT 1 FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo 'exists';
} else {
    echo 'available';
}

$stmt->close();
$conn->close();
?>