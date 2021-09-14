const navbarIcon = document.querySelector(".navbar-toggler-icon");
const navMobile = document.getElementById("nav-m");
const btn = document.getElementById("back-to-top");
const nav = document.getElementById("nav");

navbarIcon.addEventListener("click", () => {
  navMobile.classList.toggle("show");
});

window.addEventListener("scroll", () => {
  if (window.scrollY > 600) {
    btn.classList.add("show");
  } else {
    btn.classList.remove("show");
  }
});

window.addEventListener("scroll", () => {
  if (window.scrollY > 200) {
    nav.style.top = 0;
  }
});
