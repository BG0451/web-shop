<?php
function get_config($setting_name) {
    include('db.php');
    $stmt = $conn->prepare("SELECT setting_value FROM server_config WHERE setting_name = ?");
    $stmt->bind_param("s", $setting_name);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($setting_value);
    $stmt->fetch();
    
    return $setting_value;
}
?>
