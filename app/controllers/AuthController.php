<?php
class AuthController
{
    private $userModel;
    private $Env;
    private $regExp;
    public function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/models/AuthModel.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/config/env.php");
        $this->userModel = new AuthModel();
        $this->Env = new Env();
        $this->regExp = [
            "user" => "/^[a-zA-Z0-9\_\-]{4,16}$/",
            "pwd" => "/^(?!.*\s)(.{4,12})$/",
            "email" => "/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/",
            "nameAndLastName" => "/^[a-zA-ZÀ-ȳ\s]{1,50}$/"
        ];
    }


    public function CheckLogin($data)
    {
        $error = "";
        if ($data["userName"] == "") {
            $error = "Ingresar nombre de usuario para iniciar sesion.";
            return $error;
        }

        if ($data["password"] == "") {
            $error = "Ingresar la clave de usuario para iniciar sesion.";
            return $error;
        }


        $recordset = $this->userModel->CheckLogin($data["userName"]);
        if ($recordset) {
            $user = $data["userName"];
            $pwd = sha1($data["password"]);
            if ($user == $recordset["USER_NAME"] && $pwd == $recordset["USER_PWD"] && $recordset["USER_STATE"] == "1" && $recordset["DEL"] == "0") {
                $_SESSION["userlogged"] = [
                    "id" => $recordset["USER_ID"],
                    "role" => $recordset["ROLE_ID"]
                ];
                $redirect = "http://localhost/departamentalcopan/";
                header("location: $redirect");
                $error = $user;
            } else {
                $error = "Usuario y/o contraseña incorrecta.";
                return $error;
            }
        } else {
            $error = "El usuario no existe.";
            return $error;
        }
    }

    public function SaveUser($data)
    {

        $error = "";
        $response = $this->checkExistAccount($data["email"]);

        if (preg_match($this->regExp["user"], $data["userName"]) == 0) {
            $error = "Ingresar usuario válido.";
            return $error;
        }

        if (preg_match($this->regExp["email"], $data["email"]) == 0) {
            $error = "Ingresar email válido.";
            return $error;
        }

        if ($response != "Tu cuenta no existe.") {
            $error = "El correo que proporcionaste ya existe intenta con otro.";
            return $error;
        }

        if (preg_match($this->regExp["pwd"], $data["pwd"]) == 0) {
            $error = "El campo contraseña no es válido.";
            return $error;
        }

        if ($data["pwdConfirm"] != $data["pwd"]) {
            $error = "Las contraseñas no coinciden.";
            return $error;
        }

        if (preg_match($this->regExp["nameAndLastName"], $data["firstName"]) == 0) {
            $error = "El campo nombres no es válido.,";
            return $error;
        }
        if (preg_match($this->regExp["nameAndLastName"], $data["lastName"]) == 0) {
            $error = "El campo apellidos no es válido.,";
            return $error;
        }


        $rowsaffected = $this->userModel->saveUser($data);

        if ($rowsaffected > 0) {
            $destino = $this->Env->Redirect("login");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error en registro de usuario.";
            return $error;
        }
    }

    public function UpdateRecoveryPassCode($data)
    {
        $rowsaffected = $this->userModel->UpdateRecoveryPassCode($data);

        if ($rowsaffected > 0) {
            return true;
        } else {
            $error = "Error en la actualizacion del codigo.";
            return $error;
        }
    }

    public function checkExistAccount($data)
    {
        $response = "";

        $recordset = $this->userModel->checkExistAccount($data);
        if ($recordset) {
            return $recordset;
        } else {
            $response = "Tu cuenta no existe.";
            return $response;
        }
    }

    public function updateUserPwd($data)
    {
        $error = "";
        if (preg_match($this->regExp["pwd"], $data["pwd"]) == 0) {
            $error = "La nueva contraseña debe contener de 4 a 12 caracteres y sin espacios.";
            return $error;
        }

        if (preg_match($this->regExp["pwd"], $data["pwdConfirm"]) == 0) {
            $error = "La confirmacion de contraseña debe contener de 4 a 12 caracteres y sin espacios.";
            return $error;
        }

        if ($data["pwdConfirm"] != $data["pwd"]) {
            $error = "Las contraseñas no coinciden.";
            return $error;
        }

        $rowsaffected = $this->userModel->updateUserPwd($data);

        return $rowsaffected;
    }
}
