<?php
class Boot
{

    public function Start()
    {
        $view = "";
        if (isset($_SESSION["userlogged"])) {

            $view = "app/views/home.view.php";
        } else {
            $view = "app/views/auth/login.view.php";
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
