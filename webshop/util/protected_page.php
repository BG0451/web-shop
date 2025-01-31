<?php
if(!isset($_SESSION['user_id'])) {
    header('Location: /webshop/login/index.php?not_logged_in=1');
    exit();
}
?>