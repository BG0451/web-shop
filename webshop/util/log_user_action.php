<?php
function log_user_action($action, $info) {
    include('db.php');
    $sql = "INSERT INTO user_actions (action, info, user_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $action, $info, $_SESSION['user_id']);
    if($stmt->execute()) {
        return 'success';
    } else {
        return 'error';
    }
}
?>