<?php
require_once("app/controllers/UserController.php");
require_once("app/config/Env.php");

$Env = new Env();
$userController = new UserController();

$response = "";
$error = "";
$firstName = "";
$lastName = "";
$email = "";
$currentPwd = "";
$currentBdPwd = "";
$newPwd = "";
$pwdConfirm = "";
$alertStyle = "alert-danger";
$results = "";
$message = "";


if (!isset($_SESSION["userlogged"])) {
    $destine = $Env->Redirect("login");
    echo "<script>location.href='$destine';</script>";
    exit();
}

$dataSession = $_SESSION["userlogged"];

$response = $userController->getUser($dataSession["id"]);

$initialsUserName = $response["FIRSTNAME"][0] . $response["LASTNAME"][0];

if (isset($_POST["updateUser"])) {
    $userId = $dataSession["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $currentBdPwd = $response["USER_PWD"];
    $currentPwd = $_POST["currentPwd"];
    $newPwd = $_POST["newPwd"];
    $pwdConfirm = $_POST["pwdConfirm"];

    $data = [
        "userId" => $userId,
        "firstName" => $firstName,
        "lastName" => $lastName,
        "email" => $email,
        "currentPwd" => $currentPwd,
        "currentDbPwd" => $currentBdPwd,
        "newPwd" => $newPwd,
        "pwdConfirm" => $pwdConfirm,
        "roleId" => $response["ROLE_ID"],
        "state" => $response["USER_STATE"]
    ];

    $results = $userController->updateUser($data);


    if ($results["statusCode"] == 200) {
        $alertStyle = "alert-success";
        $currentPwd = "";
        $newPwd = "";
        $pwdConfirm = "";
    } else {
        $alertStyle = "alert-danger";
    }
}

?>

<div class="row mt-1 w-100 mx-0 px-3 px-md-4 px-lg-5">
    <div class="col-12 my-3 text-end px-0">
        <a href="<?php echo $APP_URL ?>user/all" class="btn-blue rounded fw-bold text-decoration-none p-2">
            <i class="fa-solid fa-users-gear me-1"></i>
            Administrar Usuarios
        </a>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <form class="col-12 col-md-8 col-lg-7 my-3 row" method="POST" id="general-data-form" enctype="multipart/form-data">
            <h4 class="fw-semibold mb-3">Datos personales</h4>
            <input type="hidden" name="userId" value="<?php echo $response["USER_ID"] ?>">
            <div class="mb-3 col-12 col-md-6">
                <label for="firstName" class="form-label fw-medium">Nombres</label>
                <div>
                    <input type="text" class="form-control bg-transparent border border-primary fw-normal" id="name" name="firstName" value="<?php echo $response["FIRSTNAME"] ?>">
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label for="lastName" class="form-label fw-medium">Apellidos</label>
                <div>
                    <input type="text" class="form-control bg-transparent border border-primary fw-normal" id="lastname" name="lastName" value="<?php echo $response["LASTNAME"] ?>">
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label for="email" class="form-label fw-medium">Correo Electrónico</label>
                <div>
                    <input type="text" class="form-control bg-transparent border border-primary fw-normal" id="email" name="email" value="<?php echo $response["USER_EMAIL"] ?>">
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>
            <div class="mb-3 col-12 col-md-6">
                <input type="hidden" name="userId" value="<?php echo $dataSession["id"] ?>">
                <label for="currentPwd" class="form-label fw-medium">Contraseña Actual</label>
                <div>
                    <input type="text" class="form-control bg-transparent border border-primary fw-normal" id="pwd" name="currentPwd" value="<?php echo $currentPwd ?>">
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label for="new-pwd" class="form-label fw-medium">Nueva Contraseña</label>
                <div>
                    <input type="password" class="form-control bg-transparent border border-primary fw-normal" id="new-pwd" name="newPwd" value="<?php echo $newPwd ?>">
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>
            <div class="mb-3 col-12 col-md-6">
                <label for="pwd-confirm" class="form-label fw-medium">Confirmar Contraseña</label>
                <div>
                    <input type="password" class="form-control bg-transparent border border-primary fw-normal" id="pwd-confirm" name="pwdConfirm" value="<?php echo $pwdConfirm ?>">
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>

            <?php
            if ($results != "") {

            ?>
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="alert  alert-dismissible fade show m-0 <?php echo $alertStyle ?>" role="alert">
                            <strong class="fs-7"><?php echo $results["message"] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <button class="btn btn-primary text-uppercase bg-blue w-100 fw-semibold position-relative">
                <input name="updateUser" value="" class="bg-transparent w-100 h-100 position-absolute start-0 border-0 top-0 outline-none btn">
                <i class="fa-solid fa-floppy-disk me-2">
                </i>Guardar Datos</input>
            </button>
        </form>

    </div>

</div>

<script type="module">
    const d = document,
        $ = (selector) => d.querySelector(selector),
        $$ = (selector) => d.querySelectorAll(selector),
        $notificationAlert = $("#notification-alert"),
        $soundNotification = $("#sound-notification"),
        $avatar = $('#avatar'),
        $fileInput = $('input[name="avatar"]'),
        $preview = $('#avatar-img'),
        $newPwd = $("input[name='newPwd']"),
        $pwdConfirm = $("input[name='pwdConfirm']");

    const regExp = {
        validExtensionImg: /(.jpg|.jpeg|.png)$/i,
        email: /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/,
        nameAndLastName: /^[a-zA-ZÀ-ȳ\s]{1,50}$/,
        pwd: /^(?!.*\s)(.{4,12})$/
    }

    function validateInput(inputs, condition, errMessage) {
        const $alertError = `<div class="row my-2">
                                <div class="col-12">
                                    <span class="fs-8 text-danger">${errMessage}</span>
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


    d.addEventListener("keyup", e => {
        if (e.target.matches('input[name="firstName"]')) {
            validateInput([e.target], (regExp.nameAndLastName.test(e.target.value)), "El campo nombres no es válido.");
        }
        if (e.target.matches('input[name="lastName"]')) {
            validateInput([e.target], (regExp.nameAndLastName.test(e.target.value)), "El campo apellidos no es válido.");
        }
        if (e.target.matches('input[name="email"]')) {
            validateInput([e.target], (regExp.email.test(e.target.value)), "El campo correo electrónico no es válido.");
        }


        if (e.target == $newPwd) {
            validateInput([e.target], (regExp.pwd.test(e.target.value)), "La contraseña debe contener de 4 a 12 caracteres y sin espacios");
            if ($pwdConfirm.value !== "") validateInput([$newPwd, $pwdConfirm], (e.target.value === $pwdConfirm.value), "Las contraseñas no coinciden");
        }

        if (e.target == $pwdConfirm) {
            validateInput([e.target], (regExp.pwd.test(e.target.value)), "La contraseña debe contener de 4 a 12 caracteres y sin espacios");
            if ($newPwd.value !== "") validateInput([$newPwd, $pwdConfirm], (e.target.value === $newPwd.value), "Las contraseñas no coinciden");
        }
    });
</script>