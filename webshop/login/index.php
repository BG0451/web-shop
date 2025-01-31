<?php include('../util/session_control.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/form.css" />
    <script src="login.js" defer></script>
<?php 
include('../templates/header.tpl.php');
if (isset($_GET['not_logged_in'])){ ?>
<div class="form-container">
  <p>To access this page you must log in.</p>
</div>
<?php } ?>
<div class="form-container">
  <h2>Log In</h2>
  <form id="loginForm">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required />
    <span id="email-error" style="color: black"></span>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required />
    <span id="password-error" style="color: black"></span>
    <label for="rememberMe">Remember Me</label>
    <input type="checkbox" id="rememberMe" name="rememberMe" />
    <button type="submit">Log In</button>
    <p id="login-message" style="color: black"></p>
  </form>
</div>
<div class="form-container">
  <a href="../signup/">Or sign up</a>
</div>
<?php include('../templates/footer.tpl.php');?>