import validateInput from "../../../app/helpers/js/validate_input.js";

const d = document,
  $ = (selector) => d.querySelector(selector),
  $$ = (selector) => d.querySelectorAll(selector),
  $notificationAlert = $("#notification-alert"),
  $soundNotification = $("#sound-notification"),
  $avatar = $("#avatar"),
  $fileInput = $('input[name="avatar"]'),
  $preview = $("#avatar-img"),
  $newPwd = $("input[name='newPwd']"),
  $pwdConfirm = $("input[name='pwdConfirm']");

const regExp = {
  validExtensionImg: /(.jpg|.jpeg|.png)$/i,
  email:
    /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/,
  nameAndLastName: /^[a-zA-ZÀ-ȳ\s]{1,50}$/,
  pwd: /^(?!.*\s)(.{4,12})$/,
};

d.addEventListener("keyup", (e) => {
  if (e.target.matches('input[name="firstName"]')) {
    validateInput(
      [e.target],
      regExp.nameAndLastName.test(e.target.value),
      "El campo nombres no es válido."
    );
  }
  if (e.target.matches('input[name="lastName"]')) {
    validateInput(
      [e.target],
      regExp.nameAndLastName.test(e.target.value),
      "El campo apellidos no es válido."
    );
  }
  if (e.target.matches('input[name="email"]')) {
    validateInput(
      [e.target],
      regExp.email.test(e.target.value),
      "El campo correo electrónico no es válido."
    );
  }

  if (e.target == $newPwd) {
    validateInput(
      [e.target],
      regExp.pwd.test(e.target.value),
      "La contraseña debe contener de 4 a 12 caracteres y sin espacios"
    );
    if ($pwdConfirm.value !== "")
      validateInput(
        [$newPwd, $pwdConfirm],
        e.target.value === $pwdConfirm.value,
        "Las contraseñas no coinciden"
      );
  }

  if (e.target == $pwdConfirm) {
    validateInput(
      [e.target],
      regExp.pwd.test(e.target.value),
      "La contraseña debe contener de 4 a 12 caracteres y sin espacios"
    );
    if ($newPwd.value !== "")
      validateInput(
        [$newPwd, $pwdConfirm],
        e.target.value === $newPwd.value,
        "Las contraseñas no coinciden"
      );
  }
});
