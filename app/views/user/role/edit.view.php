<?php
require_once("app/controllers/RoleController.php");
require_once("app/config/Env.php");
$roleController = new RoleController();
$Env = new Env();

$roleName = "";
$errorsvalidate = "";


$url = $_SERVER['REQUEST_URI'];
$components = parse_url($url);
parse_str($components['query'], $results);

$role = $roleController->getRole($results["id"]);

if (!$role) {
    $destine = $Env->Redirect("user/role/all");
    echo "<script>window.location.href='$destine';</script>";
}

if (isset($_POST["register"])) {
    $roleName = $_POST["roleName"];
    $data = [
        'roleId' => $role["ROLE_ID"],
        'roleName' => $roleName,
    ];

    $errorsvalidate = $roleController->editRole($data);
}
?>

<div class="col-10 col-md-8 col-lg-5 mt-5 text-center">
    <div class="card shadow bg-body rounded h-auto">
        <div class="card-header text-center">
            <h5 class="text-purple mb-0">Editar Rol</h5>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="text" class="form-control p-2 fw-semibold" name="roleId" value="<?php echo $role["ROLE_ID"] ?>" disabled>
                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="text" class="form-control p-2 fw-medium" name="roleName" placeholder="Descripción rol" value="<?php echo $role["ROLE_DESCRIPTION"] ?>" maxlength="50">
                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                </div>
                <?php
                if ($errorsvalidate != "") {

                ?>
                    <div class="row">
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
                <div>
                    <a href="<?php echo $APP_URL . "user/role/all" ?>" class="btn btn-warning text-white m-auto my-3 py-2 fw-semibold"><i class="fa-solid fa-ban me-2"></i>Cancelar</a>
                    <button type="submit" name="register" class="btn-blue text-white m-auto my-3 py-2 fw-semibold"><i class="fa-solid fa-floppy-disk me-2"></i>Guardar</button>
                </div>
            </form>

        </div>

    </div>
</div>

<script src="<?php echo $APP_URL . "public/js/bootstrap.min.js" ?>"></script>
<script src="<?php echo $APP_URL ?>public/js/views_js/role_edit.js" type="module"></script>

</html>