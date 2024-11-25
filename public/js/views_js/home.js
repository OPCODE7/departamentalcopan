import { APP_URL } from "../config/env.js";

const $target1 = document.getElementById("target1"),
  $target2 = document.getElementById("target2"),
  $target3 = document.getElementById("target3"),
  $target4 = document.getElementById("target4"),
  $section = document.querySelector("#section-statistics"),
  $btnSendMail = document.querySelector("#sendMail"),
  $containerAlertEmail = document.querySelector(".alert-request-container"),
  $inputEmail = document.querySelector("input[name='email']"),
  $inputName = document.querySelector("input[name='name']"),
  $inputSubject = document.querySelector("input[name='subject']"),
  $inputMessage = document.querySelector("textarea[name='message']"),
  $alertEmail = `
        <div class="alert alert-dismissible fade show" role="alert" id="alert-response-email">
                <span id="messageMail"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;
let count1 = 0,
  count2 = 0,
  count3 = 0,
  count4 = 0;

const callBack = (entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      count1 = 0;
      count2 = 0;
      count3 = 0;
      count4 = 0;

      let countersInterval = setInterval(() => {
        if (count1 < 3178) count1 += 454;
        if (count2 < 74869) count2 += 37434.5;
        if (count3 < 1278) count3 += 71;
        if (count4 < 65) count4++;

        $target1.textContent = count1;
        $target2.textContent = count2;
        $target3.textContent = count3;
        $target4.textContent = count4;

        if (count1 == 3178 && count2 == 74869 && count3 == 1278 && count4 == 65)
          clearInterval(countersInterval);
      }, 10);
    } else {
      count1 = 0;
      count2 = 0;
      count3 = 0;
      count4 = 0;
    }
  });
};

const observer = new IntersectionObserver(callBack, {
  threshold: [0.5, 0.75],
});

observer.observe($section);

const regExp = {
  user: /^[a-zA-Z0-9\_\-]{4,16}$/,
  email:
    /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/,
  onlyLetters: /^[a-zA-ZÀ-ȳ\s]{1,50}$/,
};

function validateInput(inputs, condition, errMessage) {
  const $alertError = `<div class="row my-2">
                                <div class="col-12 text-start">
                                    <span class="form-text text-danger">${errMessage}</span>
                                </div>
                             </div>
                            `;
  if (!condition) {
    inputs.forEach((input) => {
      input.classList.add("no-valid-input");
      input.parentElement.nextElementSibling.innerHTML = $alertError;
    });
    return false;
  } else {
    inputs.forEach((input) => {
      input.classList.remove("no-valid-input");
      input.parentElement.nextElementSibling.innerHTML = "";
    });
    return true;
  }
}

$btnSendMail.addEventListener("click", () => {
  $containerAlertEmail.innerHTML = "";

  async function sendMail() {
    try {
      $btnSendMail.classList.add("btn-send-mail-animation");
      const data = new FormData(document.querySelector("#contact-form"));
      let response = await fetch(`${APP_URL}app/helpers/email/sendMail.php`, {
          method: "POST",
          body: data,
        }),
        json = await response.json();

      if (json == 200) {
        $containerAlertEmail.insertAdjacentHTML("beforeend", $alertEmail);
        document.getElementById(
          "alert-response-email"
        ).firstElementChild.textContent = "Correo envíado con éxito.";
        document
          .getElementById("alert-response-email")
          .classList.add("alert-success");
        document
          .querySelectorAll("input")
          .forEach((input) => (input.value = ""));
        $inputMessage.value = "";
      } else {
        $containerAlertEmail.insertAdjacentHTML("beforeend", $alertEmail);
        document.getElementById(
          "alert-response-email"
        ).firstElementChild.textContent = "Error al envíar correo.";
        document
          .getElementById("alert-response-email")
          .classList.add("alert-danger");
      }
      $btnSendMail.classList.remove("btn-send-mail-animation");
    } catch (err) {
      $containerAlertEmail.insertAdjacentHTML("beforeend", $alertEmail);
      document.getElementById(
        "alert-response-email"
      ).firstElementChild.textContent = err;
      document
        .getElementById("alert-response-email")
        .classList.add("alert-danger");
    }
  }

  if (
    validateInput(
      [$inputName],
      regExp.onlyLetters.test($inputName.value),
      "Ingresar nombre válido"
    ) &&
    validateInput(
      [$inputEmail],
      regExp.email.test($inputEmail.value),
      "Ingresar email válido"
    ) &&
    validateInput(
      [$inputSubject],
      $inputSubject.value != "",
      "Ingresar asunto válido"
    ) &&
    validateInput(
      [$inputMessage],
      $inputMessage.value != "",
      "Ingresar mensaje válido"
    )
  ) {
    sendMail();
  }
});
