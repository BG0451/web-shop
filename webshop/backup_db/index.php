<?php 
include('../util/session_control.php');
include('../util/protected_page.php');
include('../util/admin_restrict.php');
exec("mysqldump -u root webshop > backup.sql");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Database Backup</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/form.css" />
<?php include('../templates/header.tpl.php'); ?>
<div class="container">
    <div class="form-container">
        <p>Download DB backup:</p>
        <a href="/webshop/backup_db/backup.sql">backup.sql<a>
    </div>
    <div class="flex-container">
        <?php
        echo nl2br(file_get_contents("backup.sql"));
        ?>
    </div>
    <br>
    <br>
</div>
<?php include('../templates/footer.tpl.php');?>