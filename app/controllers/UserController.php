<?php
class UserController
{
    private $userModel;
    private $Env;
    private $regExp;
    public function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/models/UserModel.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/config/Env.php");
        $this->userModel = new UserModel();
        $this->Env = new Env();

        $this->regExp = [
            "user" => "/^[a-zA-Z0-9\_\-]{4,16}$/",
            "email" => "/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/",
            "nameAndLastName" => "/^[a-zA-ZÀ-ȳ\s]{1,100}$/",
            "state" => "/^[01]$/",
            "userRole" => "/[0-9]/",
            "pwd" => "/^(?!.*\s)(.{4,12})$/"
        ];
    }


    public function getUser($userId)
    {
        $recordset = $this->userModel->getUser($userId);
        return $recordset;
    }

    public function getUsers($del)
    {
        $recordset = $this->userModel->getUsers($del);
        return $recordset;
    }


    public function updateUser($dataView)
    {
        $statusCode = 500;
        function strTrim($str)
        {
            return is_string($str) ? trim($str) : $str;
        }

        $data = array_map('strTrim', $dataView);

        $error = "";

        $forbidenchars = [" ", "/", "-", "!", "="];

        if (preg_match($this->regExp["nameAndLastName"], $data["firstName"]) == 0) {
            $error = "El campo nombres no es válido.";
            return [
                "statusCode" => $statusCode,
                "message" => $error
            ];
        }

        if (preg_match($this->regExp["nameAndLastName"], $data["lastName"]) == 0) {
            $error = "El campo apellidos no es válido.";
            return [
                "statusCode" => $statusCode,
                "message" => $error
            ];
        }


        if (preg_match($this->regExp["email"], $data["email"]) == 0) {
            $error = "Ingresar email válido.";
            return [
                "statusCode" => $statusCode,
                "message" => $error
            ];
        }

        if ($data["currentPwd"] != "") {
            if (sha1($data["currentPwd"]) != $data["currentDbPwd"]) {
                $error = "La contraseña actual no es correcta.";
                return [
                    "statusCode" => $statusCode,
                    "message" => $error
                ];
            }

            if (strlen($data["newPwd"]) > 0) {
                if (preg_match($this->regExp["pwd"], $data["newPwd"]) == 0) {
                    $error = "La nueva contraseña debe contener de 4 a 12 caracteres y sin espacios.";
                    return [
                        "statusCode" => $statusCode,
                        "message" => $error
                    ];
                }


                if ($data["pwdConfirm"] != $data["newPwd"]) {
                    $error = "Las contraseñas no coinciden.";
                    return [
                        "statusCode" => $statusCode,
                        "message" => $error
                    ];
                }

                $data["newPwd"] = sha1($data["newPwd"]);
            } else {
                $error = "La nueva contraseña debe contener de 4 a 12 caracteres y sin espacios.";
                return [
                    "statusCode" => $statusCode,
                    "message" => $error
                ];
            }
        }



        if ($data["state"] != '' && !preg_match($this->regExp["state"], $data["state"])) {
            $error = "El campo estado no es válido.";
            return [
                "statusCode" => $statusCode,
                "message" => $error
            ];
        }

        if ($data["roleId"] != '' && preg_match($this->regExp["userRole"], $data["roleId"] == 0)) {
            $error = "El campo rol no es válido.";
            return [
                "statusCode" => $statusCode,
                "message" => $error
            ];
        }


        $rowsaffected = $this->userModel->updateUser($data);
        if ($rowsaffected > 0) {
            $statusCode = 200;
            $error = "Datos actualizados correctamente.";
            // $destine = $this->Env->Redirect("user/admin");
            // echo "<script>location.href='$destine';</script>";
        } else {
            $error = "Error al actualizar información.";
        }

        return [
            "statusCode" => $statusCode,
            "message" => $error
        ];
    }
}
