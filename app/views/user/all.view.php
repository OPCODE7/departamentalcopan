<?php
require_once("app/controllers/UserController.php");
require_once("app/controllers/RoleController.php");
$userController = new UserController();
$roleController = new RoleController();
$users = $userController->getUsers(0);

if (isset($_SESSION["userlogged"])) $dataSession = $_SESSION["userlogged"];

$user = $userController->getUser($dataSession["id"]);
$roles = $roleController->getRoles("0");

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
                <a href="<?php echo $APP_URL ?>user/paperbin/all" class="btn-blue p-2 text-decoration-none rounded fs-7">
                    <span class="fa-solid fa-trash text-white"></span>
                    <span class="d-none d-md-inline text-white fw-semibold">Papelera</span>
                </a>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="row my-3">
        <div class="col-12">
            <div class="card bg-light h-auto">
                <h5 class="card-header border-bottom border-light"><strong>Usuarios Registrados</strong></h5>
                <div class="card-body">
                    <table class="table table-striped table-sm table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">COD USUARIO</th>
                                <th scope="col">NOMBRE USUARIO</th>
                                <th scope="col">NOMBRE REAL</th>
                                <th scope="col">ROL</th>
                                <th scope="col">ESTADO</th>
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
                            foreach ($users as $user) {
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $user["USER_ID"]; ?></th>
                                    <td><?php echo $user["USER_NAME"]; ?></td>
                                    <td><?php echo $user["FIRSTNAME"] . " " . $user["LASTNAME"]; ?></td>
                                    <td><?php echo $user["ROLE_DESCRIPTION"]; ?></td>
                                    <td><?php echo $user["USER_STATE"] ? "Activo" : "Inactivo"; ?></td>

                                    <?php
                                    if ($dataSession["role"] == 1) {
                                    ?>
                                        <td>
                                            <a href="<?php echo $APP_URL; ?>user/edit/?id=<?php echo $user["USER_ID"] ?>" class="btn btn-sm btn-outline-success mr-1 fw-semibold mb-1 d-block">
                                                <i class="fas fa-pencil-alt"></i>
                                                Editar
                                            </a>
                                            <a href="<?php echo $APP_URL; ?>user/trash/?id=<?php echo $user["USER_ID"] ?>" class="btn btn-sm btn-outline-danger fw-semibold d-block">
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


<script>
    new DataTable('#users', {
        responsive: true,
        autoWidth: false,

        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros que coincidan con lo que buscas",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": 'Buscar:',
            'paginate': {
                'next': 'Siguiente',
                'previous': 'Anterior'
            }

        }
    });
</script>