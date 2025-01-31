<?php
session_start();
include("../util/db.php");

$title = $_POST['title'];
$desc = $_POST['desc'];
$date = $_POST['date'];
$pname = $_POST['pname'];
$dname = $_POST['dname'];
$price = $_POST['price'];

// Nađi id igre
$stmt = $conn->prepare("INSERT INTO games (title, developer, publisher, release_date, price, description) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $title, $dname, $pname, $date, $price, $desc);
if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>