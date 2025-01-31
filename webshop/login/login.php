<?php
session_start();
include("../util/db.php");

$email = $_POST['email'];
$password = $_POST['password'];
$rememberMe = $_POST['rememberMe'];

// Traži user-a u bazi
$stmt = $conn->prepare("SELECT user_id, password, is_admin FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    echo 'Email or password is incorrect.';
    exit();
}

$stmt->bind_result($user_id, $hashed_password, $is_admin);
$stmt->fetch();

// Verifikacija hash-iranog password-a
if (password_verify($password, $hashed_password)) {
    
    // Spremi uid kao sesiju
    $_SESSION['user_id'] = $user_id;
    $_SESSION['is_admin'] = $is_admin;
    $_SESSION['LAST_ACTIVITY'] = time();
    include("../util/log_user_action.php");
    log_user_action("LOGIN", "manual");


    if ($rememberMe == "1") {
        // Generiraj token
        $token = bin2hex(random_bytes(16));

        // Stavi token u bazu
        $stmt = $conn->prepare("UPDATE users SET remember_token = ? WHERE user_id = ?");
        $stmt->bind_param("si", $token, $user_id);
        $stmt->execute();

        // Token itekne za 30 dana
        setcookie("remember_me", $token, time() + (30 * 24 * 60 * 60), "/");
    }
    echo 'success';
} else {
    echo 'Email or password is incorrect.';
}

$stmt->close();
$conn->close();
?>