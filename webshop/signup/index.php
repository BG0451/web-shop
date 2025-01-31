<?php include('../util/session_control.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/form.css" />
    <script src="signup.js" defer></script>
<?php include('../templates/header.tpl.php'); ?>
<div class="form-container">
    <h2>Sign Up</h2>
    <form id="registerForm">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required />
      <span id="username-error" style="color: black"></span>
      <br />
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required />
      <span id="email-error" style="color: black"></span>
      <br />
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required />
      <span id="password-error" style="color: black"></span>
      <br />
      <br />
      <button type="submit">Register</button>
      <p id="registration-message" style="color: black"></p>
    </form>
</div>
<?php include('../templates/footer.tpl.php');?>