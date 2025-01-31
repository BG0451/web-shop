<?php
include('../util/session_control.php');
include('../util/protected_page.php');
$gameOwned = 0;
if(isset($_GET['game'])) {
    include('../util/db.php');
    $game = $_GET['game'];
    $sql = "SELECT game_id, title, developer, publisher, release_date, price, description FROM games WHERE title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $game);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 0) {
        header('Location: /webshop/');
        exit();
    }
    $stmt->bind_result($gid, $title, $developer, $publisher, $release, $price, $desc);
    $stmt->fetch();

    $sql = "SELECT 1 FROM user_games WHERE game_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $gid, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) $gameOwned = 1;
} else {
    header('Location: /webshop/');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$_GET['game']?></title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/game_page.css" />
    <script src="game_page.js" defer></script>
<?php include('../templates/header.tpl.php'); ?>
<div class="container">
    <?php if ($_SESSION['is_admin'] == 0) { ?>

    <h2 id="gameTitle"><?=$title?></h2>
    <div class="game-details">
        <p class="desc"><?=$desc?></p>
        <p class="rel">RELEASE DATE:</p>
        <p class="date"><?=$release?></p>
        <p class="pub">PUBLISHER:</p>
        <p class="pname"><?=$publisher?></p>
        <p class="dev">DEVELOPER:</p>
        <p class="dname"><?=$developer?></p>
    </div>

    <?php }  else { ?>

    <h2 id="gameTitle"><?=$title?></h2>
    <span>New title:</span>
    <input id="title" name="title" class="title" value="<?=$title?>">
    <div class="game-details">
        <textarea type="text" id="desc" name="desc" class="desc"><?=$desc?></textarea>
        <p class="rel">RELEASE DATE:</p>
        <input type="text" id="date" name="date" class="date" value="<?=$release?>">
        <p class="pub">PUBLISHER:</p>
        <input type="text" id="pname" name="pname" class="pname" value="<?=$publisher?>">
        <p class="dev">DEVELOPER:</p>
        <input type="text" id="dname" name="dname" class="dname" value="<?=$developer?>">
    </div>

    <?php } ?>
    <div class="price-container" >
        <p>PRICE:</p>
        <?php if (!$gameOwned && $_SESSION['is_admin'] == 0) {?>

        <form id="buyForm" class="buy-container">
            <div class="price-ticket"><?=$price?> €</div>
            <button type="submit" class="buy-button">Purchase</button>
        </from>

        <?php } else { if ($_SESSION['is_admin'] == 0) { ?>

        <div class="buy-container">
            <form id="refundForm">
                <button type="submit" class="refund-button">Refund</button>
            </form>
            <form id="downloadForm">
                <button type="submit" class="download-button">Download</button>
            </form>
        </div>

        <?php } else { ?>

        <div class="admin-container">
            <input class="price-ticket" id="price" value="<?=$price?>">
            <form id="updateForm">
                <button type="submit" class="update-button">Update</button>
            </form>
            <form id="deleteForm">
                <button type="submit" class="delete-button">Delete</button>
            </form>
        </div>

        <?php }} ?>
    </div>
</div>
<?php include('../templates/footer.tpl.php');?>