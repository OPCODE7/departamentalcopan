const $eyePwd = document.getElementById("see-pwd");
$eyePwd.addEventListener("click", (e) => {
  if (e.target.classList.contains("fa-eye")) {
    e.target.classList.remove("fa-eye");
    e.target.classList.add("fa-eye-slash");
    e.target.previousElementSibling.type = "password";
  } else if (e.target.classList.contains("fa-eye-slash")) {
    e.target.classList.remove("fa-eye-slash");
    e.target.classList.add("fa-eye");
    e.target.previousElementSibling.type = "text";
  }
});
