<?php include('../util/session_control.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/form.css" />
<?php 
include('../templates/header.tpl.php');
if (isset($_GET['message'])){ ?>
<div class="form-container">
  <p><?=$_GET['message']?></p>
</div>
<?php } ?>
<?php include('../templates/footer.tpl.php');?>