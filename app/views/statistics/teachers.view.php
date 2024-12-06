<?php
require_once("app/config/Env.php");
$env = new Env();
$APP_URL = $env->APP_URL;

if (!isset($_SESSION["userlogged"])) {
    $destine = $env->Redirect("login");
    echo "<script>window.location.href='$destine';</script>";
    exit();
}
