document.addEventListener("DOMContentLoaded", () => {
  const formBuy = document.getElementById("buyForm");
  const formDownload = document.getElementById("downloadForm");
  const formRefund = document.getElementById("refundForm");
  const formUpdate = document.getElementById("updateForm");
  const formDelete = document.getElementById("deleteForm");
  const gameTitle = document.getElementById("gameTitle");
  const titleElement = document.getElementById("title");
  const descElement = document.getElementById("desc");
  const dateElement = document.getElementById("date");
  const pnameElement = document.getElementById("pname");
  const dnameElement = document.getElementById("dname");
  const priceElement = document.getElementById("price");

  game = gameTitle.textContent;

  if (formBuy != null)
    formBuy.addEventListener("submit", async (event) => {
      event.preventDefault();

      // Šalji na server
      try {
        const response = await fetch("purchase_game.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            game,
          }),
        });

        const result = await response.text();
        if (result === "success") {
          window.location.href =
            "/webshop/message/index.php?message=Purchase successful!";
        } else {
          window.location.href = "/webshop/message/index.php?message=" + result;
        }
      } catch (error) {
        window.location.href =
          "/webshop/message/index.php?message=An error occurred. Please try again.";
      }
    });

  if (formDownload != null)
    formDownload.addEventListener("submit", async (event) => {
      event.preventDefault();
      console.log("hi");

      window.location.href =
        "/webshop/message/index.php?message=Game downloading...";
    });

  if (formRefund != null)
    formRefund.addEventListener("submit", async (event) => {
      event.preventDefault();

      // Šalji na server
      try {
        const response = await fetch("refund_game.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            game,
          }),
        });

        const result = await response.text();
        if (result === "success") {
          window.location.href =
            "/webshop/message/index.php?message=Refund successful!";
        } else {
          window.location.href = "/webshop/message/index.php?message=" + result;
        }
      } catch (error) {
        window.location.href =
          "/webshop/message/index.php?message=An error occurred. Please try again.";
      }
    });

  if (formDelete != null)
    formDelete.addEventListener("submit", async (event) => {
      event.preventDefault();

      // Šalji na server
      try {
        const response = await fetch("delete_game.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            game,
          }),
        });

        const result = await response.text();
        if (result === "success") {
          window.location.href =
            "/webshop/message/index.php?message=Game deleted!";
        } else {
          window.location.href = "/webshop/message/index.php?message=" + result;
        }
      } catch (error) {
        window.location.href =
          "/webshop/message/index.php?message=An error occurred. Please try again.";
      }
    });

  if (formUpdate != null)
    formUpdate.addEventListener("submit", async (event) => {
      event.preventDefault();

      title = titleElement.value;
      desc = descElement.value;
      date = dateElement.value;
      pname = pnameElement.value;
      dname = dnameElement.value;
      price = priceElement.value;

      // Šalji na server
      try {
        const response = await fetch("update_game.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            game,
            title,
            desc,
            date,
            pname,
            dname,
            price,
          }),
        });

        const result = await response.text();
        if (result === "success") {
          window.location.href =
            "/webshop/message/index.php?message=Game updated!";
        } else {
          window.location.href = "/webshop/message/index.php?message=" + result;
        }
      } catch (error) {
        window.location.href =
          "/webshop/message/index.php?message=An error occurred. Please try again.";
      }
    });
});
