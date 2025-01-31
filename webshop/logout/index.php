<?php
include('../util/session_control.php');
include('../util/protected_page.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log Out</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/form.css" />
    <script src="logout.js" defer></script>
<?php include('../templates/header.tpl.php'); ?>
<div class="form-container">
    <h2>Log out?</h2>
    <form id="logoutForm">
        <button type="submit">Yes</button>
    </form>
    <p id="logout-message" style="color: black"></p>
</div>
<?php include('../templates/footer.tpl.php');?>