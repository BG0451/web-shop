<?php 
include('../util/session_control.php'); 
include('../util/protected_page.php');
include('../util/admin_restrict.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Set Config</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/form.css" />
    <script src="set_config.js" defer></script>
<?php include('../templates/header.tpl.php'); ?>
<div class="form-container">
    <form id="configForm">
        <p>pagination:</p>
        <input type="number" id="pagination" value=<?=get_config("pagination");?>>
        <p>session_timeout:</p>
        <input type="number" id="session_timeout" value=<?=get_config("session_timeout");?>>
        <br>
        <br>
        <button type="submit">Apply changes</button>
    </form>
</div>
<?php include('../templates/footer.tpl.php');?>