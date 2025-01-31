<?php include('../util/session_control.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/form.css" />
<?php include('../templates/header.tpl.php'); ?>
<div class="form-container">
    <h1>Contact Us</h1>
    <form action="send_email.php" method="post">
        <p>Name:</p>
        <input type="text" id="name" name="name" required>
        <br>
        <p>Email:</p>
        <input type="email" id="email" name="email" required>
        <br>
        <p>Message:</p>
        <textarea id="message" name="message" rows="5" required></textarea>
        <br>
        <button type="submit">Send</button>
    </form>
</div>
<?php include('../templates/footer.tpl.php');?>