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
    <title>Add Game</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/game_page.css" />
    <script src="add_game.js" defer></script>
<?php include('../templates/header.tpl.php'); ?>
<div class="container">
    <span>New game title:</span>
    <input id="title" name="title" class="title">
    <div class="game-details">
        <textarea type="text" id="desc" name="desc" class="desc"></textarea>
        <p class="rel">RELEASE DATE:</p>
        <input type="text" id="date" name="date" class="date">
        <p class="pub">PUBLISHER:</p>
        <input type="text" id="pname" name="pname" class="pname">
        <p class="dev">DEVELOPER:</p>
        <input type="text" id="dname" name="dname" class="dname">
    </div>
    <div class="price-container" >
        <p>PRICE:</p>
        <div class="create-container">
            <input class="price-ticket" id="price">
            <form id="createForm">
                <button type="submit" class="buy-button">Create</button>
            </form>
        </div>
    </div>
</div>
<?php include('../templates/footer.tpl.php');?>