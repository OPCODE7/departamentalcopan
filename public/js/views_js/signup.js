import validateInput from "../../../app/helpers/js/validate_input.js";
const d = document,
  $eyePwd = d.querySelectorAll("#see-pwd"),
  $pwd = d.querySelector("input[name='password']"),
  $pwdConfirm = d.querySelector("input[name='password-confirm']");

const regExp = {
  user: /^[a-zA-Z0-9\_\-]{4,16}$/,
  pwd: /^(?!.*\s)(.{4,12})$/,
  email:
    /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/,
  nameAndLastName: /^[a-zA-ZÀ-ȳ\s]{1,50}$/,
};

d.querySelectorAll("input").forEach((el) =>
  el.setAttribute("autocomplete", "off")
);

d.addEventListener("click", (e) => {
  $eyePwd.forEach((eye) => {
    if (e.target === eye) {
      if (e.target.classList.contains("fa-eye")) {
        e.target.classList.remove("fa-eye");
        e.target.classList.add("fa-eye-slash");
        e.target.previousElementSibling.type = "password";
      } else if (e.target.classList.contains("fa-eye-slash")) {
        e.target.classList.remove("fa-eye-slash");
        e.target.classList.add("fa-eye");
        e.target.previousElementSibling.type = "text";
      }
    }
  });
});

d.addEventListener("keyup", (e) => {
  if (e.target.matches('input[name="user"]')) {
    validateInput(
      [e.target],
      regExp.user.test(e.target.value),
      "El usuario tiene que ser de 4 a 16 caracteres y solo puede contener numeros, letras y guion bajo"
    );
  }

  if (e.target.matches("input[name='email']")) {
    validateInput(
      [e.target],
      regExp.email.test(e.target.value),
      "El correo solo puede contener letras, numeros, puntos, guiones y guion bajo"
    );
  }

  if (e.target.matches("input[name='password']")) {
    validateInput(
      [e.target],
      regExp.pwd.test(e.target.value),
      "La contraseña debe contener de 4 a 12 caracteres y sin espacios"
    );
    if ($pwdConfirm.value !== "")
      validateInput(
        [$pwd, $pwdConfirm],
        e.target.value === $pwdConfirm.value,
        "Las contraseñas no coinciden"
      );
  }

  if (e.target.matches("input[name='password-confirm']")) {
    validateInput(
      [e.target],
      regExp.pwd.test(e.target.value),
      "La contraseña debe contener de 4 a 12 caracteres y sin espacios"
    );
    if ($pwd.value !== "")
      validateInput(
        [$pwd, $pwdConfirm],
        e.target.value === $pwd.value,
        "Las contraseñas no coinciden"
      );
  }

  if (e.target.matches("input[name='realname']")) {
    validateInput(
      [e.target],
      regExp.nameAndLastName.test(e.target.value),
      "El nombre debe de contener entre 1 a 50 caracteres, puede incluir espacios y acentos"
    );
  }
  if (e.target.matches("input[name='lastname']")) {
    validateInput(
      [e.target],
      regExp.nameAndLastName.test(e.target.value),
      "El apellido debe de contener entre 1 a 50 caracteres, puede incluir espacios y acentos"
    );
  }
});
