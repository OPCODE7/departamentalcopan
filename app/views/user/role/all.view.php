<?php
require_once("app/controllers/UserController.php");
$userController = new UserController();
$users = $userController->getUsers(0);

if (isset($_SESSION["userlogged"])) $dataSession = $_SESSION["userlogged"];

$user = $userController->getUser($dataSession["id"]);
$roles = $userController->getRoles();

if (!$user) {
    $destine = $Env->Redirect("404");
    header("Location: $destine");
}


?>

<div class="container">
    <?php
    if ($dataSession["role"] == "1") {
    ?>
        <div class="row ">
            <div class="col-12 text-end mt-3">
                <a href="<?php echo $APP_URL ?>user/role/paperbin/all" class="btn-blue p-2 text-decoration-none rounded fs-7">
                    <span class="fa-solid fa-trash text-white"></span>
                    <span class="d-none d-md-inline text-white fw-semibold">Papelera</span>
                </a>
                <a href="<?php echo $APP_URL ?>user/role/new" class="btn-blue p-2 text-decoration-none rounded fs-7 ms-2">
                    <span class="fa-solid fa-plus-circle text-white"></span>
                    <span class="d-none d-md-inline text-white fw-semibold">Nuevo</span>
                </a>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="row my-3">
        <div class="col-12">
            <div class="card bg-light h-auto">
                <h5 class="card-header border-bottom border-light"><strong>Roles Registrados</strong></h5>
                <div class="card-body">
                    <table class="table table-striped table-sm table-bordered" id="users">
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
                                            <a href="<?php echo $APP_URL; ?>user/role/edit?id=<?php echo $role["ROLE_ID"] ?>" class="btn btn-sm btn-outline-success mr-1 fw-semibold mb-1 d-block">
                                                <i class="fas fa-pencil-alt"></i>
                                                Editar
                                            </a>
                                            <a href="<?php echo $APP_URL; ?>user/role/delete?id=<?php echo $role["ROLE_ID"] ?>" class="btn btn-sm btn-outline-danger fw-semibold d-block">
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