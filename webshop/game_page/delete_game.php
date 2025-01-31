<?php
session_start();
include("../util/db.php");

$game = $_POST['game'];

// Briši igru iz baze
$stmt = $conn->prepare("DELETE FROM games WHERE title = ?");
$stmt->bind_param("s", $game);
if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>