const d = document,
  $ = (selector) => d.querySelector(selector),
  $$ = (selector) => d.querySelectorAll(selector),
  $navbarHeader = $("#navbar-header"),
  $dropDownNavbarLayout = $$("#dropdown-navbar-layout"),
  $buttonScrollTop = $("#go-top");

window.addEventListener("resize", (e) => {
  if (window.innerWidth >= 992) {
    $navbarHeader.classList.remove("navbar-nav-scroll");
    $dropDownNavbarLayout.forEach((dropdown) => {
      dropdown.setAttribute("data-bs-auto-close", "true");
    });
  } else {
    $navbarHeader.classList.add("navbar-nav-scroll");
    $dropDownNavbarLayout.forEach((dropdown) => {
      dropdown.setAttribute("data-bs-auto-close", "false");
    });
  }
});

window.addEventListener("scroll", (e) => {
  let scrollY = window.scrollY;
  if (scrollY >= 1000) {
    $buttonScrollTop.classList.remove("visually-hidden");
  } else {
    $buttonScrollTop.classList.add("visually-hidden");
  }

  updateProgressBar();
});

function updateProgressBar() {
  var scrollPosition =
    document.documentElement.scrollTop || document.body.scrollTop;
  var scrollHeight =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  var scrollPercentage = (scrollPosition / scrollHeight) * 100;

  document.getElementById("progressBar").style.width = scrollPercentage + "%";
}

$buttonScrollTop.addEventListener("click", (e) => window.scrollTo(0, 0));

d.addEventListener("DOMContentLoaded", (e) => {
  if (window.innerWidth >= 992) {
    $navbarHeader.classList.remove("navbar-nav-scroll");
    $dropDownNavbarLayout.forEach((dropdown) => {
      dropdown.setAttribute("data-bs-auto-close", "true");
    });
  } else {
    $navbarHeader.classList.add("navbar-nav-scroll");
    $dropDownNavbarLayout.forEach((dropdown) => {
      dropdown.setAttribute("data-bs-auto-close", "false");
    });
  }
});

d.addEventListener("click", (e) => {
  if (
    !e.target.matches(".dropdown-menu") &&
    !e.target.matches(".dropdown-menu > *") &&
    !e.target.matches(".dropdown-toggle")
  ) {
    d.querySelectorAll(".dropdown-menu").forEach((dropdown) => {
      if (dropdown.classList.contains("show"))
        dropdown.classList.remove("show");
    });
  }

  if (e.target.matches(".avatar-user") || e.target.matches(".avatar-user > *"))
    d.querySelector(".user-info").classList.toggle("d-none");
});
