import validateInput from "../../../app/helpers/js/validate_input.js";

const d = document,
  $pwd = d.querySelector("input[name='password']"),
  $pwdConfirm = d.querySelector("input[name='password-confirm']");

const regExp = {
  pwd: /^(?!.*\s)(.{4,12})$/,
};

d.addEventListener("keyup", (e) => {
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
});
