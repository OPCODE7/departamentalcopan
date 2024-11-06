<?php
require_once("app/config/Routes.php");
require_once("app/config/Env.php");

require_once("app/controllers/AuthController.php");
$authController = new AuthController();
$route = new Routes();
$env = new Env();
$APP_URL = $env->APP_URL;


$username = "";
$email = "";
$password = "";
$passwordConfirm = "";
$firstName = "";
$lastName = "";
$realLastname = "";
$errorsvalidate = "";

if (isset($_POST["register"])) {
    $username = $_POST["user"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["password-confirm"];
    $email = $_POST["email"];
    $firstName = $_POST["realname"];
    $lastName = $_POST["lastname"];

    $data = [
        "firstName" => $firstName,
        "lastName" => $lastName,
        "userName" => $username,
        "email" => $email,
        "pwd" => $password,
        "pwdConfirm" => $passwordConfirm,
    ];


    $errorsvalidate = $authController->saveUser($data);
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEPARTAMENTALCOPAN | SignUp</title>
    <link rel="stylesheet" href="<?php echo $env->APP_URL . "public/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo $env->APP_URL  . "public/css/custom_styles/styles.css" ?>">
    <link rel="stylesheet" href="<?php echo $env->APP_URL  . "public/assets/fontawesome/css/all.min.css" ?>">
    <link rel="shortcut icon" href="<?php echo $env->APP_URL . "public/assets/icons/secretaria.ico" ?>" type="image/x-icon">
    <link
        rel="stylesheet"
        href="<?php echo $env->APP_URL ?>public/plugins/animatecss/animate.compat.css" />
</head>

<body>
    <div class="row w-100 d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-md-8 col-lg-5 text-center">
            <div class="card shadow bg-body rounded animated zoomIn h-auto">
                <div class="card-header text-center">
                    <h5 class="mb-0 text-secondary">Registrarse</h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <input type="text" class="form-control p-2" name="realname" placeholder="Nombre" value="<?php echo $firstName ?>" maxlength="50">
                                </div>
                                <div id="alert-error" class="mt-3"></div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <input type="text" class="form-control p-2" name="lastname" placeholder="Apellidos" value="<?php echo $lastName ?>" maxlength="50">
                                </div>
                                <div id="alert-error" class="mt-3"></div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control p-2" name="user" placeholder="Usuario" value="<?php echo $username ?>" maxlength="16">
                                </div>
                                <div id="alert-error" class="mt-3"></div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control p-2" name="email" placeholder="Correo" value="<?php echo $email ?>" maxlength="255">
                                </div>
                                <div id="alert-error" class="mt-3"></div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 position-relative">
                                    <input type="password" class="form-control p-2" name="password" placeholder="Contraseña" value="<?php echo $password ?>" maxlength="12">
                                    <i class="fa-solid fa-eye-slash position-absolute end-0 top-50 translate-middle cursor-pointer text-secondary" id="see-pwd"></i>
                                </div>
                                <div id="alert-error" class="mt-3"></div>
                            </div>
                            <div class="col-12">

                                <div class="mb-3 position-relative">
                                    <input type="password" class="form-control p-2" name="password-confirm" placeholder="Repite tu contraseña" value="<?php echo $passwordConfirm ?>" maxlength="12">
                                    <i class="fa-solid fa-eye-slash position-absolute end-0 top-50 translate-middle cursor-pointer text-secondary" id="see-pwd"></i>
                                </div>
                                <div id="alert-error" class="mt-3"></div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" name="register" class="btn btn-primary text-white me-2 col-4">Crear cuenta</button>
                            <a href="<?php echo $APP_URL ?>" class="btn btn-danger col-4">Cancelar</a>
                        </div>
                    </form>
                    <?php
                    if ($errorsvalidate != "") {

                    ?>
                        <div class="row my-2">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show mb-0 py-2" role="alert">
                                    <strong class="fs-8"><?php echo $errorsvalidate ?></strong>
                                    <button type="button" class="btn-close top-50 translate-middle" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="w-100 m-auto d-flex flex-column d-flex align-items-center py-2 card-footer">
                    <a href="<?php echo $APP_URL . "login" ?>" class="text-decoration-none">Iniciar Sesión</a>
                </div>

            </div>
        </div>
    </div>

    <script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>

    <script>
        const d = document,
            $eyePwd = d.querySelectorAll("#see-pwd"),
            $pwd = d.querySelector("input[name='password']"),
            $pwdConfirm = d.querySelector("input[name='password-confirm']");

        const regExp = {
            user: /^[a-zA-Z0-9\_\-]{4,16}$/,
            pwd: /^(?!.*\s)(.{4,12})$/,
            email: /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/,
            nameAndLastName: /^[a-zA-ZÀ-ȳ\s]{1,50}$/
        }



        function validateInput(inputs, condition, errMessage) {
            const $alertError = `<div class="row my-2">
                                <div class="col-12 text-start">
                                    <span class="form-text text-danger">${errMessage}</span>
                                </div>
                             </div>
                            `;
            if (!(condition)) {
                inputs.forEach(input => {
                    input.classList.add("no-valid-input");
                    input.parentElement.nextElementSibling.innerHTML = $alertError;
                });
            } else {
                inputs.forEach(input => {
                    input.classList.remove("no-valid-input");
                    input.parentElement.nextElementSibling.innerHTML = "";
                });
            }
        }
        d.querySelectorAll("input").forEach(el => el.setAttribute("autocomplete", "off"));

        d.addEventListener("click", e => {

            $eyePwd.forEach(eye => {
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

        d.addEventListener("keyup", e => {
            if (e.target.matches('input[name="user"]')) {
                validateInput([e.target], (regExp.user.test(e.target.value)), "El usuario tiene que ser de 4 a 16 caracteres y solo puede contener numeros, letras y guion bajo");
            }

            if (e.target.matches("input[name='email']")) {
                validateInput([e.target], (regExp.email.test(e.target.value)), "El correo solo puede contener letras, numeros, puntos, guiones y guion bajo")
            }

            if (e.target.matches("input[name='password']")) {
                validateInput([e.target], (regExp.pwd.test(e.target.value)), "La contraseña debe contener de 4 a 12 caracteres y sin espacios");
                if ($pwdConfirm.value !== "") validateInput([$pwd, $pwdConfirm], (e.target.value === $pwdConfirm.value), "Las contraseñas no coinciden");
            }

            if (e.target.matches("input[name='password-confirm']")) {
                validateInput([e.target], (regExp.pwd.test(e.target.value)), "La contraseña debe contener de 4 a 12 caracteres y sin espacios");
                if ($pwd.value !== "") validateInput([$pwd, $pwdConfirm], (e.target.value === $pwd.value), "Las contraseñas no coinciden");
            }

            if (e.target.matches("input[name='realname']")) {
                validateInput([e.target], regExp.nameAndLastName.test(e.target.value), "El nombre debe de contener entre 1 a 50 caracteres, puede incluir espacios y acentos");
            }
            if (e.target.matches("input[name='lastname']")) {
                validateInput([e.target], regExp.nameAndLastName.test(e.target.value), "El apellido debe de contener entre 1 a 50 caracteres, puede incluir espacios y acentos");
            }


        });
    </script>

</body>