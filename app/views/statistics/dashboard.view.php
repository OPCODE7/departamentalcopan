<?php
require_once("app/config/Env.php");
$env = new Env();
$APP_URL = $env->APP_URL;

if (!isset($_SESSION["userlogged"])) {
    $destine = $env->Redirect("login");
    echo "<script>window.location.href='$destine';</script>";
    exit();
}

?>

<div class="row">
    <div class="col-12">
        <img src="<?php echo $APP_URL ?>public/assets/images/uti-banner.png" class="img-fluid w-100 h-100" alt="UTI-REINGENIERIA">
    </div>
</div>

<div class="row w-100 my-5 d-flex justify-content-center">
    <div class="col-10 col-md-3 mb-3 mb-md-0">
        <a href="<?php echo $APP_URL ?>statistics/enrollment" class="text-decoration-none w-100 d-inline-block text-center shadow-btn">Matrícula</a>
    </div>
    <div class="col-10 col-md-3 mb-3 mb-md-0">
        <a href="<?php echo $APP_URL ?>statistics/teachers" class="text-decoration-none w-100 d-inline-block text-center shadow-btn">Docentes</a>
    </div>
    <div class="col-10 col-md-3 mb-3 mb-md-0">
        <a href="<?php echo $APP_URL ?>statistics/educationalcenters" class="text-decoration-none w-100 d-inline-block text-center shadow-btn">Centros Educativos</a>
    </div>
    <div class="col-10 col-md-3 mb-3 mb-md-0">
        <a href="<?php echo $APP_URL ?>statistics/monthlyparts" class="text-decoration-none w-100 d-inline-block text-center shadow-btn">Partes Mensuales</a>
    </div>
</div>