<?php
session_start();
include("../util/db.php");

$game = $_POST['game'];
$uid = $_SESSION['user_id'];

// Nađi id igre
$stmt = $conn->prepare("SELECT game_id FROM games WHERE title = ?");
$stmt->bind_param("s", $game);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 0) {
    echo 'Game could not be found.';
    exit();
}
$stmt->bind_result($gid);
$stmt->fetch();

// Dodaj igru iz user library
//$purchase_time = date("Y-m-d", time());
$stmt = $conn->prepare("DELETE FROM user_games WHERE user_id = ? AND game_id = ?");
$stmt->bind_param("ss", $uid, $gid);

if ($stmt->execute()) {
    echo 'success';
    include("../util/log_user_action.php");
    log_user_action("REFUND", $game);
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>