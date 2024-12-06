const d = document,
  $ = (selector) => d.querySelector(selector),
  $$ = (selector) => d.querySelectorAll(selector),
  $container = $("#container-principal"),
  $navbarHeader = $("#navbar-header"),
  $dropDownNavbarLayout = $$("#dropdown-navbar-layout"),
  $buttonScrollTop = $("#go-top"),
  $modalTerms = `
  <div class="terms-conditions position-fixed start-0 top-0 w-100 h-100 bg-dark d-flex justify-content-center align-items-center opacity-75" id="opacity-terms" style="z-index: 5;">
  </div>
  <div class="bg-light rounded col-11 col-md-5 col-lg-6 overflow-y-scroll p-4 position-fixed start-50 top-50 translate-middle lh-lg" id="modal-terms" style="height: 60vh;z-index:999;">
      <h2>Términos y Condiciones</h2>
      <p>Bienvenido al sitio web oficial de la Dirección Departamental de Educación de Copán. Al acceder y utilizar este sitio, usted acepta cumplir con los siguientes términos y condiciones. Por favor, léalos detenidamente antes de continuar navegando.</p>
      <ol>
          <li>El uso del sitio web es exclusivamente permitido para los estudiantes y docentes de la Dirección Departamental de Educación de Copán.</li>
          <li>No se permiten la reproducción, distribución, o comercialización de este sitio web en ningún formato, ni en ninguna forma, sin la autorización previa y expresa de la Dirección Departamental de Educación de Copán.</li>
          <li>Los términos y condiciones de este sitio web se aplican a todos los usuarios que acceden al mismo.</li>
          <li>El sitio web se encuentra protegido por las leyes de protección de datos personales y la Ley Federal de Protección de Datos Personales en vigencia.</li>
      </ol>
      <div class="w-100 text-center">
          <button class="btn btn-primary" id="btn-accept-terms">Aceptar</button>
          <button class="btn btn-secondary" onclick="window.location.href=''">Cancelar</button>
      </div>
  </div>

  `;

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

  let acceptTerms = localStorage.getItem("accept-terms");
  if (acceptTerms != "yes") {
    $container.insertAdjacentHTML("beforeend", $modalTerms);
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

  if (e.target.matches("#btn-accept-terms")) {
    $("#modal-terms").classList.add("d-none");
    $("#opacity-terms").classList.add("d-none");
    localStorage.setItem("accept-terms", "yes");
  }
});
