const navbarIcon = document.querySelector(".navbar-toggler-icon");
const navMobile = document.getElementById("nav-m");

navbarIcon.addEventListener("click", () => {
  console.log(navbarIcon);
  navMobile.classList.toggle("show");
});
