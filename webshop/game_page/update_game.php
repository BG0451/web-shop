<?php
session_start();
include("../util/db.php");

$game = $_POST['game'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$date = $_POST['date'];
$pname = $_POST['pname'];
$dname = $_POST['dname'];
$price = $_POST['price'];

// Nađi id igre
$stmt = $conn->prepare("UPDATE games SET title = ?, developer = ?, publisher = ?, release_date = ?, price = ?, description = ? WHERE title = ?");
$stmt->bind_param("sssssss", $title, $dname, $pname, $date, $price, $desc, $game);
if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>