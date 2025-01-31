document.addEventListener("DOMContentLoaded", () => {
  const configForm = document.getElementById("configForm");
  const pagination = document.getElementById("pagination");
  const session_timeout = document.getElementById("session_timeout");

  configForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const newPagination = pagination.value;
    const newSession_timeout = session_timeout.value;

    try {
      const response = await fetch("set_config.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          newPagination,
          newSession_timeout,
        }),
      });

      const result = await response.text();
      if (result === "success") {
        window.location.href =
          "/webshop/message/index.php?message=Settings changed.";
      } else {
        window.location.href = "/webshop/message/index.php?message=" + result;
      }
    } catch (error) {
      window.location.href =
        "/webshop/message/index.php?message=An error occurred. Please try again.";
    }
  });
});
