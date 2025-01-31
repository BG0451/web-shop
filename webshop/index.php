<?php include('util/session_control.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Webshop</title>
    <link rel="stylesheet" href="styles/style.css" />
    <script src="game_list_script.js" defer></script>
<?php include('templates/header.tpl.php'); ?>
    <div class="container">
        <br />
      <div class="search-sort-container">
        <input
          type="text"
          id="search-input"
          placeholder="Search by title, publisher, or developer"
        />
        <select id="sort-select">
          <option value="title_asc">Sort by Title (A-Z)</option>
          <option value="title_desc">Sort by Title (Z-A)</option>
          <option value="release_date_asc">
            Sort by Release Date (Earliest)
          </option>
          <option value="release_date_desc">
            Sort by Release Date (Latest)
          </option>
          <option value="price_asc">Sort by Price (Lowest)</option>
          <option value="price_desc">Sort by Price (Highest)</option>
        </select>
      </div>
      <div id="games-table" class="flex-container">
        <!-- Dodaj igre s AJAX-om -->
      </div>
      <div id="pagination">
        <!-- Dodaj paginaciju s AJAX-om -->
      </div>
      <br />
    </div>
<?php include('templates/footer.tpl.php');?>