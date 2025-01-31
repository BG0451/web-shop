<?php
session_start();

include("server_config.php");
include("log_user_action.php");
$timeout_duration = get_config("session_timeout");

// Provjeri aktivnost user-a
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    if(isset($_SESSION['user_id'])) log_user_action("LOGOUT", "timed_out");
    session_unset();
    session_destroy();
}

// Ako cookie postoji auto login
if (isset($_COOKIE['remember_me']) && !isset($_SESSION['user_id'])) {
    include('db.php');
    $stmt = $conn->prepare("SELECT user_id, is_admin FROM users WHERE remember_token = ?");
    $stmt->bind_param("s", $_COOKIE['remember_me']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows != 0) {
        $stmt->bind_result($user_id, $is_admin);
        $stmt->fetch();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['is_admin'] = $is_admin;
        log_user_action("LOGIN", "remember_me");
    }
}

// Postavi vrijeme zadnje interakcije sa stranicom
$_SESSION['LAST_ACTIVITY'] = time();
?>