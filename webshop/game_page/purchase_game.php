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

// Dodaj igru userov library
$purchase_time = date("Y-m-d", time());
$stmt = $conn->prepare("INSERT INTO user_games (user_id, game_id, purchase_time) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $uid, $gid, $purchase_time);

if ($stmt->execute()) {
    echo 'success';
    include("../util/log_user_action.php");
    log_user_action("BUY", $game);
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>