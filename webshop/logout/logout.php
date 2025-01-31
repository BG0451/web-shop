<?php
session_start();
include("../util/db.php");

$uid = $_SESSION['user_id'];

if (isset($uid)) {
    include("../util/log_user_action.php");
    log_user_action("LOGOUT", "manual");
    session_unset();
    session_destroy();
    if (isset($_COOKIE['remember_me'])) {
        // Izbriši cookie na client strani
        setcookie('remember_me', '', time() - 1, "/");
        // Izbriši cookie na server strani
        $stmt = $conn->prepare("UPDATE users SET remember_token = NULL WHERE user_id = ?");
        $stmt->bind_param("i", $uid);
        $stmt->execute();
    }
}
echo 'success';
?>