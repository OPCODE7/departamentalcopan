<?php
class Boot
{

    public function Start()
    {
        $view = "";

        if (isset($_SESSION["userlogged"])) {
            $userData = $_SESSION["userlogged"];
        } else {
            $view = "app/views/layout.view.php";
        }

        if (isset($_GET["view"]) && $_GET["view"] == "forgotpwd") {
            $view = "app/views/auth/forgotpwd.view.php";
        }

        if (isset($_GET["view"]) && $_GET["view"] == "register") {
            $view = "app/views/auth/signup.view.php";
        }
        return $view;
    }
}
