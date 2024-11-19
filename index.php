<?php
session_start();

require_once "app/config/Env.php";
require_once "app/config/BootStrapper.php";

$boot = new Boot();

$redirect = $boot->Start();

include $redirect;
