document.addEventListener("DOMContentLoaded", () => {
  let currentPage = 1;
  let searchQuery = "";
  let sortBy = "title_asc";

  // AJAX za dinamičko dohvaćanje podataka iz games tablice
  const fetchGames = (page, search, sort) => {
    const xhr = new XMLHttpRequest();
    xhr.open(
      "GET",
      `fetch_games.php?page=${page}&search=${search}&sort=${sort}`,
      true
    );
    xhr.onload = () => {
      if (xhr.status >= 200 && xhr.status < 300) {
        const response = JSON.parse(xhr.responseText);
        displayGames(response.games);
        setupPagination(response.totalPages, page);
      } else {
        console.error("Server error:", xhr.status, xhr.statusText);
      }
    };
    xhr.onerror = () => {
      console.error("Request error");
    };
    xhr.send();
  };

  // Dodaj igre u games-table element
  const displayGames = (games) => {
    const container = document.getElementById("games-table");
    container.innerHTML = "";
    games.forEach((game) => {
      const a = document.createElement("a");
      a.className = "gameLink";
      a.href = `/webshop/game_page/index.php?game=${game.title}`;
      const div = document.createElement("div");
      div.className = "grid-item";
      div.innerHTML = `
                    <div class="title">${game.title}</div>
                    <div class="developer">Developer: ${game.developer}</div>
                    <div class="publisher">Publisher: ${game.publisher}</div>
                    <div class="release">${game.release_date}</div>
                    <div class="price">${parseFloat(game.price).toFixed(
                      2
                    )} €</div>
                `;
      a.appendChild(div);
      container.appendChild(a);
    });
  };

  // Napravi paginaciju koja je prilagođena broju rezultata
  const setupPagination = (totalPages, currentPage) => {
    const pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    const createButton = (text, page, disabled = false) => {
      const button = document.createElement("button");
      button.textContent = text;
      button.className = `page-button${disabled ? " disabled" : ""}`;
      button.disabled = disabled;
      button.onclick = () => {
        if (!disabled) {
          currentPage = page;
          fetchGames(currentPage, searchQuery, sortBy);
        }
      };
      return button;
    };

    pagination.appendChild(
      createButton("Previous", currentPage - 1, currentPage === 1)
    );
    for (let i = 1; i <= totalPages; i++) {
      pagination.appendChild(createButton(i, i, i === currentPage));
    }
    pagination.appendChild(
      createButton("Next", currentPage + 1, currentPage === totalPages)
    );
  };

  document.getElementById("search-input").addEventListener("input", (event) => {
    searchQuery = event.target.value;
    fetchGames(currentPage, searchQuery, sortBy);
  });

  document.getElementById("sort-select").addEventListener("change", (event) => {
    sortBy = event.target.value;
    fetchGames(currentPage, searchQuery, sortBy);
  });

  fetchGames(currentPage, searchQuery, sortBy);
});
