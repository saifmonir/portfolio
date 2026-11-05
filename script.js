document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".main-nav");
  const toggle = document.querySelector(".nav-toggle");
  const navLinks = document.querySelectorAll(".nav-links a");

  if (nav && toggle) {
    toggle.addEventListener("click", () => {
      const isOpen = nav.classList.toggle("nav-open");
      toggle.setAttribute("aria-expanded", String(isOpen));
    });

    navLinks.forEach((link) => {
      link.addEventListener("click", () => {
        nav.classList.remove("nav-open");
        toggle.setAttribute("aria-expanded", "false");
      });
    });
  }

  const statusBox = document.getElementById("form-status");
  const params = new URLSearchParams(window.location.search);
  const status = params.get("status");
  const message = params.get("message");

  if (statusBox && status && message) {
    statusBox.textContent = decodeURIComponent(message);
    statusBox.classList.add(status === "success" ? "success" : "error");
  }
});
