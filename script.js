document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".main-nav");
  const toggle = document.querySelector(".nav-toggle");
  const navLinks = document.querySelectorAll(".nav-links a");

  if (!nav || !toggle) return;

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
});
