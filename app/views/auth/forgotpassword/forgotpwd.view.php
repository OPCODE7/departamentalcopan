<?php
require_once("app/controllers/AuthController.php");
require_once("app/config/env.php");
$authController = new AuthController();
$env = new Env();
$APP_URL = $env->APP_URL;

$email = "";
$to = "";
$subject = "";
$message = "";
$headers = "";
$code = "";
$filterSearchAccount = "";
$responseSearchAccount = "";
$sent = "";
$destino = "";
$msgError = "";
$sent = false;


function codeGenerator($length)
{
    $code = '';
    $pattern = '1234567890';
    $max = strlen($pattern) - 1;
    for ($i = 0; $i < $length; $i++) {
        $code .= $pattern[mt_rand(0, $max)];
    }
    return $code;
}

if (isset($_POST["checkAccount"])) {
    $filterSearchAccount = $_POST["searchParameter"];

    $responseSearchAccount = $authController->checkExistAccount($filterSearchAccount);

    $sent = false;

    if ($responseSearchAccount != "Tu cuenta no existe.") {
        $code = codeGenerator(6);
        $currentAttemps = $responseSearchAccount["LIMIT_REQUEST_PASSRECOVERY_CODE"];
        if ($currentAttemps > 5) {
            $msgError = "Excedio el número de intentos";
        } else {
            $data = [
                "newCode" => $code,
                "currentAttemps" => $currentAttemps + 1,
                "userId" => $responseSearchAccount["USER_ID"]
            ];

            $destino = $env->Redirect("resetpwd") . "?user_id=" . $responseSearchAccount["USER_ID"] . "&token=" . $code;

            $updateRecoveryPassCode = $authController->UpdateRecoveryPassCode($data);
            $email = $responseSearchAccount["USER_EMAIL"];
            $name = $responseSearchAccount["FIRSTNAME"] . " " . $responseSearchAccount["LASTNAME"];
            $to = "{$email}";
            $subject = "Formulario Recuperación de Cuenta Direccion Departamental Copán";
            $message = <<<HTML
            <h2>De Dirección Departamental de Educación Copán</h2>
            <h4>Hola $name se ha solicitado un reinicio de contraseña.</h4>
            <p>Para reestablecer tu contraseña, visita la siguiente dirección: <a href='$destino' target='_blank'>Cambiar contraseña</a></p>
            HTML;

            $headers = "Content-type: text/html; charset=utf-8 \r\n";
            $headers .= "MIME-Version: 1.0 \r\n";
            $headers .= "From: Formulario Recuperación de Cuenta<test@gmail.com>";

            if (mail($to, $subject, $message, $headers)) {
                $sent = true;
            }
        }
    } else {
        $msgError = "Tu cuenta no existe.";
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
        <div class="card h-auto" id="nextConfirmSend">
            <div class="card-header">
                <h5 class="mb-0">Recupera tu cuenta</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" id="sendEmailForm">
                    <p class="card-title">Introduce tu correo electrónico para enviarte un enlace y puedas recuperar tu cuenta.</p>
                    <input type="text" class="form-control p-2 mt-3" placeholder="Ingresar email o nombre de usuario" maxlength="255" name="searchParameter">
                    <?php
                    ?>
                    <div id="not-found-account" class="form-text text-danger fs-7 mt-2"><?php echo $msgError ?></div>
                    <?php
                    ?>

                    <?php
                    if (!$sent && $sent != "") {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                            <p class="fs-7">Lo sentimos el correo no pudo ser enviado intenta de nuevo.</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>


                    <div class="d-flex justify-content-end align-items-center mt-4">
                        <a href="<?php echo $APP_URL . "login" ?>" class="btn bg-body-secondary text-secondary align-self-end">Cancelar</a>
                        <button type="submit" class="btn-blue text-white align-self-end ms-2" id="check-account" name="checkAccount">Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>
<script>
    let $isSent = "<?php echo $sent ?>"
    const d = document,
        $sendEmailForm = d.getElementById("sendEmailForm");

    if ($isSent) {
        $sendEmailForm.innerHTML = `
                    <div class="text-center">
                        <p>Hemos enviado un link para la restauración de tu contraseña al correo <?php echo $email; ?>.</p>
                        <a href="<?php echo $APP_URL . "login"; ?>" class="btn btn-success">OK</a>
                    </div>
        `;
    }
</script>
</body>

</html>