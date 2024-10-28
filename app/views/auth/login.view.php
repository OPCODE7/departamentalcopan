<?php
require_once("app/config/Routes.php");
require_once("app/config/Env.php");
require_once("app/controllers/AuthController.php");

$usercontroller = new AuthController();
$route = new Routes();
$env = new Env();

$username = "";
$password = "";

$errorsvalidate = "";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = [
        "userName" => $username,
        "password" => $password
    ];

    $errorsvalidate = $usercontroller->CheckLogin($data);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEPARTAMENTALCOPAN | LOGIN</title>
    <link rel="stylesheet" href="<?php echo $env->APP_URL . "public/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo $env->APP_URL  . "public/css/custom_styles/styles.css" ?>">
    <link rel="stylesheet" href="<?php echo $env->APP_URL  . "public/assets/fontawesome/css/all.min.css" ?>">
    <link rel="shortcut icon" href="<?php echo $env->APP_URL . "public/assets/icons/secretaria.ico" ?>" type="image/x-icon">
    <link
        rel="stylesheet"
        href="<?php echo $env->APP_URL ?>public/plugins/animatecss/animate.compat.css" />
</head>

<body>
    <div class="row justify-content-center align-items-center vh-100 w-100">
        <form class="col-10 col-md-6 col-lg-4 shadow-lg rounded p-4 animated zoomIn" method="POST">
            <div class="mb-3 text-center">
                <img src="<?php echo $env->APP_URL ?>public/assets/images/logo-depa-copan.png" alt="logo-depacopan" class="img-fluid" style="width: 250px;height: 60px;">
            </div>
            <div class="mb-3">
                <label for="user-name" class="form-label text-secondary">Usuario</label>
                <input type="text" class="form-control" id="user-name" name="username">
            </div>
            <label for="pasword" class="form-label text-secondary">Contraseña</label>
            <div class="mb-3 position-relative">
                <input type="password" class="p-2 form-control w-100" name="password" value="" autocomplete="off">
                <i class="fa-solid fa-eye-slash position-absolute end-0 top-50 translate-middle cursor-pointer text-secondary" id="see-pwd"></i>
            </div>
            <?php
            if ($errorsvalidate != "") {

            ?>
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="alert  alert-dismissible fade show m-0 alert-danger" role="alert">
                            <strong class="fs-7"><?php echo $errorsvalidate ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <button type="submit" class="btn btn-primary w-50 mx-auto d-block mb-2" name="login">Log In</button>
            <div class="w-100 m-auto d-flex flex-column d-flex align-items-center py-2">
                <small><a href="<?php echo $env->APP_URL . "forgotpwd" ?>" class="text-decoration-none d-block mb-2">¿Olvidaste tu contraseña?</a></small>
                <small class="text-secondary">¿No tienes cuenta? <a href="<?php echo $env->APP_URL . "signup" ?>" class="text-decoration-none">Registrate</a></small>
            </div>
        </form>
    </div>

    <script src="<?php echo $env->APP_URL  . "public/js/bootstrap.bundle.min.js" ?>"></script>

    <script>
        const d = document,
            $eyePwd = d.getElementById("see-pwd");
        d.addEventListener("click", e => {
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
    </script>

</body>

</html>