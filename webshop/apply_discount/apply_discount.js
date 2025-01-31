document.addEventListener("DOMContentLoaded", () => {
  const discountForm = document.getElementById("discountForm");
  const discountElement = document.getElementById("discount");

  discountForm.addEventListener("submit", async (event) => {
    event.preventDefault();
    const discount = discountElement.value;

    try {
      const response = await fetch("apply_discount.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          discount,
        }),
      });

      const result = await response.text();
      if (result === "success") {
        window.location.href =
          "/webshop/message/index.php?message=Discount successful!";
      } else {
        window.location.href = "/webshop/message/index.php?message=" + result;
      }
    } catch (error) {
      window.location.href =
        "/webshop/message/index.php?message=An error occurred. Please try again.";
    }
  });
});
