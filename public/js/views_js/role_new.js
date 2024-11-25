import validateInput from "../../../app/helpers/js/validate_input.js";

const d = document;

const regExp = {
  role: /^(?!.\s)(.{4,100})$/,
};

d.querySelectorAll("input").forEach((el) =>
  el.setAttribute("autocomplete", "off")
);

d.addEventListener("keyup", (e) => {
  if (e.target.matches('input[name="roleName"]')) {
    validateInput(
      [e.target],
      regExp.role.test(e.target.value),
      "El campo descripción de rol no es válido."
    );
  }
});
