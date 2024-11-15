<?php
require_once("app/config/env.php");
require_once("app/controllers/UserController.php");
require_once("app/controllers/RoleController.php");

if (isset($_SESSION["userlogged"])) $dataSession = $_SESSION["userlogged"];
if ($dataSession["role"] != "1") header("Location:" . $APP_URL . "administration/user/all");

$userController = new UserController();
$roleController = new RoleController();
$Env = new Env();

$userName = "";
$realName = "";
$lastName = "";
$email = "";
$state = "";
$role = "";
$errorsvalidate = "";
$avatar = "";
$alertStyle = "alert-danger";

$url = $_SERVER['REQUEST_URI'];
$components = parse_url($url);
parse_str($components['query'], $results);

$user = $userController->getUser($results["id"]);
$roles = $roleController->getRoles("0");

if (!$user) {
    $destine = $Env->Redirect("404");
    header("Location: $destine");
}

if (isset($_POST["edit"])) {
    $userName = trim($_POST["userName"]);
    $realName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $state = isset($_POST["state"]) ? trim($_POST["state"]) : '0';
    $role = trim($_POST["role"]);


    $data = [
        'userId' => $user["USER_ID"],
        'userName' => $userName,
        'firstName' => $realName,
        'lastName' => $lastName,
        'newPwd' => '',
        'currentPwd' => '',
        'email' => $email,
        'state' => $state,
        'roleId' => $role
    ];

    $errorsvalidate = $userController->updateUser($data);

    if ($errorsvalidate["statusCode"] == 200) {
        $destino = $Env->Redirect("user/all");
        $alertStyle = "alert-success";
        echo "<script>location.href='$destino';</script>";
    } else {
        $errorsvalidate = "Error al actualizar usuario.";
    }
}
?>

<div class="col-10 col-md-8 col-lg-5 mt-5 text-center">
    <div class="card shadow bg-body rounded h-auto">
        <div class="card-header text-center">
            <h5 class="text-purple mb-0">Editar Usuario</h5>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="text" class="form-control p-2 fw-semibold" name="userId" value="<?php echo $user["USER_ID"] ?>" disabled>
                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="text" class="form-control p-2 fw-medium" name="userName" placeholder="Nombre usuario" value="<?php echo $user["USER_NAME"] ?>" maxlength="16">
                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="text" class="form-control p-2 fw-medium" name="firstName" placeholder="Nombre real" value="<?php echo $user["FIRSTNAME"] ?>" maxlength="100">
                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="text" class="form-control p-2 fw-medium" name="lastName" placeholder="Apellidos" value="<?php echo $user["LASTNAME"] ?>" maxlength="100">
                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="text" class="form-control p-2 fw-medium" name="email" placeholder="Email" value="<?php echo $user["USER_EMAIL"] ?>" maxlength="255">
                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <select name="role" class="form-control fw-medium">
                                <?php
                                foreach ($roles as $_role) {
                                ?>

                                    <option <?php echo $user["ROLE_ID"] == $_role["ROLE_ID"] ? 'selected="true"' : ""; ?> value="<?php echo $_role["ROLE_ID"] ?>" class="fw-medium"><?php echo $_role["ROLE_DESCRIPTION"] ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3 d-flex justify-content-start align-items-center">
                            <label for="state" class="fw-medium me-2">Estado</label>
                            <input type="checkbox" name="state" <?php if ($user["USER_STATE"] == "1") echo "checked" ?> class="cursor-pointer" style="width: 15px;height: 15px;" value="<?php echo $user["USER_STATE"] ?>">
                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                </div>
                <?php
                if ($errorsvalidate != "") {

                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert <?php echo $alertStyle ?> alert-dismissible fade show mb-0 py-2" role="alert">
                                <strong class="fs-8"><?php echo $errorsvalidate["message"] ?></strong>
                                <button type="button" class="btn-close top-50 translate-middle" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div>
                    <a href="<?php echo $APP_URL . "user/all" ?>" class="btn btn-warning text-white m-auto w-40 my-3 py-2"><i class="fa-solid fa-ban me-2"></i>Cancelar</a>
                    <button type="submit" name="edit" class="btn-blue text-white m-auto w-40 my-3   fw-semibold"><i class="fa-solid fa-floppy-disk me-2"></i>Guardar</button>
                </div>
            </form>

        </div>

    </div>
</div>

<script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>
<script>
    const d = document;

    const regExp = {
        user: /^[a-zA-Z0-9\_\-]{4,16}$/,
        email: /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/,
        nameAndLastName: /^[a-zA-ZÀ-ȳ\s]{1,50}$/,
        state: /^[01]$/,
        userRole: /[0-9]/
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
    d.querySelectorAll("input").forEach(el => el.setAttribute("autocomplete", "off"));

    d.addEventListener("keyup", e => {
        if (e.target.matches('input[name="userName"]')) {
            validateInput([e.target], (regExp.user.test(e.target.value)), "El campo usuario no es válido.");
        }
        if (e.target.matches('input[name="realName"]')) {
            validateInput([e.target], (regExp.nameAndLastName.test(e.target.value)), "El campo nombre real no es válido.");
        }
        if (e.target.matches('input[name="lastName"]')) {
            validateInput([e.target], (regExp.nameAndLastName.test(e.target.value)), "El campo apellidos no es válido.");
        }
        if (e.target.matches('input[name="email"]')) {
            validateInput([e.target], (regExp.email.test(e.target.value)), "El campo email no es válido.");
        }
    });

    d.addEventListener("change", e => {
        if (e.target.matches("input[name='state'")) {
            e.target.value = e.target.checked ? "1" : "0";
            validateInput([e.target], (regExp.state.test(e.target.value)), "El campo estado no es válido.");
        }

        if (e.target.matches("input[name='role'")) {
            validateInput([e.target], (regExp.userRole.test(e.target.value)), "El campo rol no es válido.");
        }
    });
</script>

</html>