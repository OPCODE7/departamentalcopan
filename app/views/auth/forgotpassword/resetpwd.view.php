<?php
require_once("app/controllers/AuthController.php");
require_once("app/controllers/UserController.php");
require_once("app/config/Env.php");
$authController = new AuthController();
$userController = new UserController();
$env = new Env();
$APP_URL = $env->APP_URL;

$password = "";
$passwordConfirm = "";
$response = "";
$url = "";

$url = $_SERVER['REQUEST_URI'];
$components = parse_url($url);
parse_str($components['query'], $results);


if ($results["user_id"] == null || $results["token"] == null) {
    header("Location: login");
} else {
    if (isset($_POST["changePwd"])) {
        $password = $_POST["password"];
        $passwordConfirm = $_POST["password-confirm"];

        $userData = $userController->getUser($results["user_id"]);
        if ($userData["PWD_REQUEST"] == 1) {
            if ($userData["TOKEN"] == $results["token"] && $userData["USER_ID"] == $results["user_id"]) {
                $data = [
                    "userId" => $userData["USER_ID"],
                    "pwd" => $password,
                    "pwdConfirm" => $passwordConfirm
                ];
                $response = $authController->updateUserPwd($data);

                if ($response) {
                    header("Location: login");
                } else {
                    $response = "Error al actualizar contraseña";
                }
            } else {
                $response = "Tu contraseña no ha podido ser actualizada parametros inválidos.";
            }
        } else {
            $response = "Este link esta caducado vuelve a solicitar un nuevo link.";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $env->APP_URL . "public/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo $env->APP_URL  . "public/css/custom_styles/styles.css" ?>">
    <link rel="stylesheet" href="<?php echo $env->APP_URL  . "public/assets/fontawesome/css/all.min.css" ?>">
    <link rel="shortcut icon" href="<?php echo $env->APP_URL . "public/assets/icons/logo-depa-copan.ico" ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo $env->APP_URL ?>public/plugins/animatecss/animate.compat.css" />
</head>

<div class="row min-vh-100 justify-content-center align-items-center mx-0">
    <div class="col-11 col-md-8 col-lg-5 px-0">
        <div class="card h-auto">
            <div class="card-header">
                <h5 class="mb-0">Cambiar Contraseña</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 position-relative">
                                <input type="password" class="form-control p-2" name="password" placeholder="Contraseña" value="<?php echo $password ?>" maxlength="12">
                                <i class="fa-solid fa-eye-slash position-absolute end-0 top-50 translate-middle cursor-pointer" id="see-pwd"></i>
                            </div>
                            <div id="alert-error" class="mt-3"></div>
                        </div>
                        <div class="col-12">

                            <div class="mb-3 position-relative">
                                <input type="password" class="form-control p-2" name="password-confirm" placeholder="Repite tu contraseña" value="<?php echo $passwordConfirm ?>" maxlength="12">
                                <i class="fa-solid fa-eye-slash position-absolute end-0 top-50 
                                translate-middle cursor-pointer" id="see-pwd"></i>
                            </div>
                            <div id="alert-error" class="mt-3"></div>
                        </div>
                    </div>

                    <?php
                    if ($response != "") {
                    ?>
                        <div class="row my-2">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show mb-0 py-2" role="alert">
                                    <strong class="fs-8"><?php echo $response ?></strong>
                                    <button type="button" class="btn-close top-50 translate-middle" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    <div class="d-flex justify-content-end align-items-center mt-4">
                        <a href="<?php echo $APP_URL . "login" ?>" class="btn bg-body-secondary text-secondary w-25 align-self-end">Cancelar</a>
                        <button type="submit" class="btn-blue text-white w-25 align-self-end ms-2" name="changePwd">Cambiar</button>

                    </div>
                </form>

            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>
<script src="<?php echo $APP_URL . "app/helpers/js/show_hide_pwd.js" ?>"></script>
<script src="<?php echo $APP_URL . "public/js/views_js/reset_pwd.js" ?>" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>


</html>