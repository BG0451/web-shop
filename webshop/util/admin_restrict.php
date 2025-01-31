<?php
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: /webshop/message/index.php?message=Not authorised to enter page!');
    exit();
}
?>