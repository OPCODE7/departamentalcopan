<?php
class Boot
{

    public function Start()
    {
        $view = "";
        $userData = [];


        if (isset($_SESSION["userlogged"])) {
            $userData = $_SESSION["userlogged"];
            $view = "app/views/layout.view.php";
        } else {
            $view = "app/views/layout.view.php";
        }
        if (isset($_GET["view"]) && ($_GET["view"] == "login" || $_GET["view"] == "auth/login") && count($userData) == 0) {
            $view = "app/views/auth/login.view.php";
        } else {
            $view = "app/views/layout.view.php";
        }

        if (isset($_GET["view"]) && $_GET["view"] == "forgotpwd") {
            $view = "app/views/auth/forgotpwd.view.php";
        }

        if (isset($_GET["view"]) && ($_GET["view"] == "signup" || $_GET["view"] == "auth/signup")) {
            $view = "app/views/auth/signup.view.php";
        }

        return $view;
    }
}
