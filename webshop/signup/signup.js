document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registerForm");
  const usernameField = document.getElementById("username");
  const emailField = document.getElementById("email");
  const passwordField = document.getElementById("password");
  const registrationMessage = document.getElementById("registration-message");
  const usernameError = document.getElementById("username-error");
  const emailError = document.getElementById("email-error");
  const passwordError = document.getElementById("password-error");

  // AJAX za provjeru username-a
  const checkUsername = (username) => {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../util/check_username.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = () => {
      if (xhr.status >= 200 && xhr.status < 300) {
        const result = xhr.responseText;
        if (result === "exists") {
          usernameError.textContent = "Username is already taken.";
        } else {
          usernameError.textContent = "";
        }
      } else {
        console.error("Server error:", xhr.status, xhr.statusText);
      }
    };

    xhr.onerror = () => {
      console.error("Request error");
    };

    const data = new URLSearchParams({ username }).toString();

    xhr.send(data);
  };

  usernameField.addEventListener("blur", () => {
    const username = usernameField.value;
    if (username) {
      checkUsername(username);
    }
  });

  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    registrationMessage.textContent = "";
    usernameError.textContent = "";
    emailError.textContent = "";
    passwordError.textContent = "";

    validationFlag = 0;
    const username = usernameField.value;
    const email = emailField.value;
    const password = passwordField.value;

    // Validacija
    if (!/^[a-zA-Z0-9_]{3,16}$/.test(username)) {
      usernameError.textContent =
        "Username must be 3-16 characters long and can include letters, numbers, and underscores.";
      validationFlag = 1;
    }

    if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
      emailError.textContent = "Invalid email format.";
      validationFlag = 1;
    }

    if (!/(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(password)) {
      passwordError.textContent =
        "Password must be at least 8 characters long and include both letters and numbers.";
      validationFlag = 1;
    }

    if (validationFlag) return;

    // Šalji na server
    try {
      const response = await fetch("signup.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          username,
          email,
          password,
        }),
      });

      const result = await response.text();
      if (result === "success") {
        registrationMessage.textContent =
          "Registration successful! Redirecting to dashboard...";
        setTimeout(() => (window.location.href = "/webshop/"), 2000); // Redirect za 2 sek
      } else {
        registrationMessage.textContent = result;
      }
    } catch (error) {
      registrationMessage.textContent = "An error occurred. Please try again.";
    }
  });
});
