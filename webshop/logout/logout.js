document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("logoutForm");
  const logoutMessage = document.getElementById("logout-message");

  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    // Šalji na server
    try {
      const response = await fetch("logout.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: null,
      });

      const result = await response.text();
      if (result === "success") {
        logoutMessage.textContent =
          "Log out successful! Redirecting to your dashboard...";
        setTimeout(() => (window.location.href = "/webshop/"), 2000); // Redirect za 2 sek
      } else {
        logoutMessage.textContent = result;
      }
    } catch (error) {
      logoutMessage.textContent = "An error occurred. Please try again.";
    }
  });
});
