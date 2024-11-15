<?php
require_once("app/controllers/UserController.php");
require_once("app/controllers/RoleController.php");
$userController = new UserController();
$roleController = new RoleController();
$users = $userController->getUsers(0);

if (isset($_SESSION["userlogged"])) $dataSession = $_SESSION["userlogged"];

$user = $userController->getUser($dataSession["id"]);
$roles = $roleController->getRoles("1");

if (!$user) {
    $destine = $Env->Redirect("404");
    header("Location: $destine");
}


?>

<div class="container">
    <div class="row ">
        <div class="col-12 text-end mt-3">
            <a href="<?php echo $APP_URL ?>user/role/all" class="btn-blue p-2 text-decoration-none rounded fs-7">
                <i class="fa-solid fa-left-long"></i>
                <span class="d-none d-md-inline text-white fw-semibold">Volver</span>
            </a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card bg-light h-auto">
                <h5 class="card-header border-bottom border-light"><strong>Roles en Papelera</strong></h5>
                <div class="card-body">
                    <table class="table table-striped table-sm table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">ID_ROL</th>
                                <th scope="col">DESCRIPCION</th>
                                <th scope="col">FECHA REGISTRO</th>
                                <?php
                                if ($dataSession["role"] == 1) {
                                ?>
                                    <th scope="col">ACCIONES</th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($roles as $role) {
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $role["ROLE_ID"]; ?></th>
                                    <td><?php echo $role["ROLE_DESCRIPTION"]; ?></td>
                                    <td><?php echo $role["INSERTED_AT"]; ?></td>

                                    <?php
                                    if ($dataSession["role"] == 1) {
                                    ?>
                                        <td>
                                            <a href="<?php echo $APP_URL; ?>user/role/paperbin/recovery?id=<?php echo $role["ROLE_ID"] ?>" class="btn btn-sm btn-outline-success mr-1 fw-semibold mb-1 d-block">
                                                <i class="fa-solid fa-reply-all"></i>
                                                Recuperar
                                            </a>
                                            <a href="<?php echo $APP_URL; ?>user/role/paperbin/destroy?id=<?php echo $role["ROLE_ID"] ?>" class="btn btn-sm btn-outline-danger fw-semibold d-block">
                                                <i class="fas fa-trash"></i>
                                                Eliminar
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>