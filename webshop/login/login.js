document.addEventListener("DOMContentLoaded", () => {
  console.log("ok");
  const form = document.getElementById("loginForm");
  const emailField = document.getElementById("email");
  const passwordField = document.getElementById("password");
  const rememberMeField = document.getElementById("rememberMe");
  const loginMessage = document.getElementById("login-message");
  const emailError = document.getElementById("email-error");
  const passwordError = document.getElementById("password-error");

  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    loginMessage.textContent = "";
    emailError.textContent = "";
    passwordError.textContent = "";

    const email = emailField.value;
    const password = passwordField.value;
    const rememberMe = rememberMeField.checked ? "1" : "0";

    // Validacija
    if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
      emailError.textContent = "Invalid email format.";
      return;
    }

    if (password.length === 0) {
      passwordError.textContent = "Password is required.";
      return;
    }

    // Šalji na server
    try {
      const response = await fetch("login.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          email,
          password,
          rememberMe,
        }),
      });

      const result = await response.text();
      if (result === "success") {
        loginMessage.textContent =
          "Login successful! Redirecting to your dashboard...";
        setTimeout(() => (window.location.href = "/webshop/"), 2000); // Redirect za 2 sek
      } else {
        loginMessage.textContent = result;
      }
    } catch (error) {
      loginMessage.textContent = "An error occurred. Please try again.";
    }
  });
});
