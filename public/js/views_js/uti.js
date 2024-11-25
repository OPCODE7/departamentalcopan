import { APP_URL } from "../config/env.js";

const $btnDropdown = document.getElementById("dropdown-btn"),
  $aside = document.querySelector(".aside-uti"),
  $alertUti = document.querySelector("#alert-uti"),
  $manualSaceSection = document.querySelector("#manual-sace-section"),
  $btnMenuAside = document.getElementById("btn-menu-aside"),
  $opacityDiv = document.getElementById("opacity-div"),
  $contentUti = document.getElementById("content-uti");
let $footer;

const getHtml = async (url) => {
  try {
    let res = await fetch(url, {
        method: "GET",
        headers: {
          "Content-Type": "text/html; charset= utf-8",
        },
      }),
      resText = await res.text();

    if (!res.ok)
      throw {
        status: res.status,
        statusText: res.statusText,
      };

    $contentUti.innerHTML = resText;
  } catch (err) {
    $contentUti.innerHTML = `<p>${err.status}: ${
      err.statusText || "Ocurrio un error"
    }</p>`;
  }
};

const callBack = (entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      $aside.classList.add("position-static");
    } else {
      $aside.classList.remove("position-static");
    }
  });
};
let observer = new IntersectionObserver(callBack, {
  threshold: [0.0, 0.75],
});

if (document.body.clientWidth > 767) {
  setTimeout(() => {
    $footer = document.querySelector("footer");
    observer.observe($footer);
  }, 500);
}

$aside.addEventListener("click", (e) => {
  // if (e.target.matches("#uti-home") || e.target.matches("#uti-home > *")) {
  //     $alertUti.classList.remove("d-none");
  // } else {
  //     $alertUti.classList.add("d-none");
  // }
  if (e.target === $btnDropdown || e.target.matches("#dropdown-btn > *")) {
    $btnDropdown.nextElementSibling.classList.toggle("d-none");
    $btnDropdown.lastElementChild.classList.toggle("fa-chevron-right");
  }

  if (e.target.matches("#btn-manual-sace-section > *")) {
    getHtml(`${APP_URL}app/views/uti/manualsace.html`);
  }
  if (e.target.matches("#btn-seminario-pnted > *")) {
    getHtml(`${APP_URL}app/views/uti/seminariopnted.html`);
  }
});

$btnMenuAside.addEventListener("click", (e) => {
  $aside.style = "left: 0";
  $opacityDiv.classList.remove("d-none");
});

$opacityDiv.addEventListener("click", () => {
  $aside.style = "left: -100%";
  $opacityDiv.classList.add("d-none");
});

window.addEventListener("resize", () => {
  if (document.body.clientWidth <= 767) {
    observer.disconnect();
    $aside.style = "left: -100%";
  } else {
    $aside.style = "left: 0";
    $opacityDiv.classList.add("d-none");
    observer.observe($footer);
  }
});
