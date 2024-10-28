<?php
require_once("app/config/Env.php");
$env = new Env();

session_destroy();
$redirect = $env->Redirect("home");

echo "<script>window.location.href='$redirect';</script>";
