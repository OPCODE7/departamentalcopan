export default function validateInput(inputs, condition, errMessage) {
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
  } else {
    inputs.forEach((input) => {
      input.classList.remove("no-valid-input");
      input.parentElement.nextElementSibling.innerHTML = "";
    });
  }
}
