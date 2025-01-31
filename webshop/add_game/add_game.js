document.addEventListener("DOMContentLoaded", () => {
  const formCreate = document.getElementById("createForm");
  const titleElement = document.getElementById("title");
  const descElement = document.getElementById("desc");
  const dateElement = document.getElementById("date");
  const pnameElement = document.getElementById("pname");
  const dnameElement = document.getElementById("dname");
  const priceElement = document.getElementById("price");

  formCreate.addEventListener("submit", async (event) => {
    event.preventDefault();

    title = titleElement.value;
    desc = descElement.value;
    date = dateElement.value;
    pname = pnameElement.value;
    dname = dnameElement.value;
    price = priceElement.value;

    // Šalji na server
    try {
      const response = await fetch("add_game.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
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
          "/webshop/message/index.php?message=Game created!";
      } else {
        window.location.href = "/webshop/message/index.php?message=" + result;
      }
    } catch (error) {
      window.location.href =
        "/webshop/message/index.php?message=An error occurred. Please try again.";
    }
  });
});
