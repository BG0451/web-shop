<?php
include("../util/db.php");
$newPrice = 1 - $_POST['discount']/100;


$stmt = $conn->prepare("UPDATE games SET price = price * ? ");
$stmt->bind_param("s", $newPrice);
if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'Error: ' . $stmt->error;
}
/*
$stmt->close();
$conn->close();*/
?>