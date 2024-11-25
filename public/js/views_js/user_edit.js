import validateInput from "../../../app/helpers/js/validate_input.js";
const d = document;

const regExp = {
  user: /^[a-zA-Z0-9\_\-]{4,16}$/,
  email:
    /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/,
  nameAndLastName: /^[a-zA-ZÀ-ȳ\s]{1,50}$/,
  state: /^[01]$/,
  userRole: /[0-9]/,
};

d.querySelectorAll("input").forEach((el) =>
  el.setAttribute("autocomplete", "off")
);

d.addEventListener("keyup", (e) => {
  if (e.target.matches('input[name="userName"]')) {
    validateInput(
      [e.target],
      regExp.user.test(e.target.value),
      "El campo usuario no es válido."
    );
  }
  if (e.target.matches('input[name="realName"]')) {
    validateInput(
      [e.target],
      regExp.nameAndLastName.test(e.target.value),
      "El campo nombre real no es válido."
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
      "El campo email no es válido."
    );
  }
});

d.addEventListener("change", (e) => {
  if (e.target.matches("input[name='state'")) {
    e.target.value = e.target.checked ? "1" : "0";
    validateInput(
      [e.target],
      regExp.state.test(e.target.value),
      "El campo estado no es válido."
    );
  }

  if (e.target.matches("input[name='role'")) {
    validateInput(
      [e.target],
      regExp.userRole.test(e.target.value),
      "El campo rol no es válido."
    );
  }
});
