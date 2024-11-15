<?php
require_once("app/controllers/RoleController.php");
$roleController = new RoleController();

$roleName = "";
$errorsvalidate = "";

$nextId = $roleController->getNextRoleId();

if (isset($_POST["register"])) {
    $roleName = $_POST["roleName"];
    $data = [
        'roleName' => $roleName,
    ];

    $errorsvalidate = $roleController->saveRole($data);
}
?>

<div class="col-10 col-md-8 col-lg-5 mt-5 text-center">
    <div class="card shadow bg-body rounded h-auto">
        <div class="card-header text-center">
            <h5 class="text-purple mb-0">Nuevo Rol</h5>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="text" class="form-control p-2 fw-semibold" name="idCatalog" value="<?php echo $nextId ?>" disabled>
                        </div>
                        <div id="alert-error" class="mt-3"></div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="text" class="form-control p-2 fw-medium" name="roleName" placeholder="Descripción rol" value="<?php echo $roleName ?>" maxlength="50">
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
<script>
    const d = document;

    const regExp = {
        role: /^(?!.\s)(.{4,100})$/
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
        if (e.target.matches('input[name="roleName"]')) {
            validateInput([e.target], (regExp.role.test(e.target.value)), "El campo descripción de rol no es válido.");
        }
    });
</script>

</html>