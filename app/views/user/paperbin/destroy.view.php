<?php
require_once("app/controllers/UserController.php");
require_once("app/config/env.php");
$userController = new UserController();
$Env = new Env();

$userName = "";
$errorsvalidate = "";

$url = $_SERVER['REQUEST_URI'];
$components = parse_url($url);
parse_str($components['query'], $results);

$user = $userController->getUser($results["id"]);

if (!$user) {
    $destine = $Env->Redirect("user/all");
    header("Location: $destine");
}

if (isset($_POST["destroy"])) {
    $errorsvalidate = $userController->destroyUser($user["USER_ID"]);
}
?>



<div class="col-10 col-md-8 col-lg-5 mt-5 text-center">
    <div class="card shadow bg-body rounded h-auto">
        <div class="card-header text-center">
            <h5 class="text-purple mb-0">Eliminar Usuario</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <span class="fw-medium">¿Estas seguro que deseas eliminar definitivamente de la base de datos el rol <b><?php echo $user["FIRSTNAME"] . " " . $user["LASTNAME"] ?></b>?</span>
                        </div>
                    </div>
                </div>
                <?php
                if ($errorsvalidate != "") {

                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show mb-0 py-2" user="alert">
                                <strong class="fs-8"><?php echo $errorsvalidate ?></strong>
                                <button type="button" class="btn-close top-50 translate-middle" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div>
                    <a href="<?php echo $APP_URL . "user/paperbin/all" ?>" class="btn btn-warning text-white m-auto w-40 my-3 py-2 fw-semibold"><i class="fa-solid fa-ban me-2"></i>Cancelar</a>
                    <button type="submit" name="destroy" class="btn btn-danger text-white m-auto w-40 my-3 py-2 fw-semibold">
                        <i class="fa-solid fa-trash-can"></i>
                        Aceptar
                    </button>
                </div>
            </form>

        </div>

    </div>
</div>