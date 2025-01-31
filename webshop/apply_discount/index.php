<?php include('../util/session_control.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Discount</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/form.css" />
    <script src="apply_discount.js" defer></script>
<?php include('../templates/header.tpl.php'); ?>
<form id="discountForm"  class="form-container">
  <input type="number" id="discount" value="0"/>
  <button type="submit">
    Appy Discount
  </button>
</form>
<?php include('../templates/footer.tpl.php'); ?>