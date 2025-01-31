<?php
include("../util/db.php");

$newPagination = $_POST['newPagination'];
$newSession_timeout = $_POST['newSession_timeout'];
$errorCheck = 0;

// Postavi pagination
$stmt = $conn->prepare("UPDATE server_config SET setting_value = ? WHERE setting_name = 'pagination'");
$stmt->bind_param("s", $newPagination);
$stmt->execute();

// Postavi pagination
$stmt = $conn->prepare("UPDATE server_config SET setting_value = ? WHERE setting_name = 'session_timeout'");
$stmt->bind_param("s", $newSession_timeout);
$stmt->execute();

echo 'success';

$stmt->close();
$conn->close();
?>