<?php
class RoleController
{
    private $roleModel;
    private $Env;
    private $regExp;

    public function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/models/RoleModel.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/config/Env.php");
        $this->roleModel = new RoleModel();
        $this->Env = new Env();

        $this->regExp = [
            "roleName" => "/^(?!.\s)[a-zA-Z](.{1,50})$/"
        ];
    }


    public function getRoles($del)
    {
        $recordset = $this->roleModel->getRoles($del);
        return $recordset;
    }

    public function getRole($roleId)
    {
        $recordset = $this->roleModel->getRole($roleId);
        return $recordset;
    }

    public function saveRole($data)
    {
        if (preg_match($this->regExp["roleName"], $data["roleName"]) == 0) {
            $error = "El nombre del rol debe contener de 1 a 50 caracteres no numéricos.";
            return $error;
        }

        $rowsaffected = $this->roleModel->saveRole($data);

        if ($rowsaffected > 0) {
            $destino = $this->Env->Redirect("user/role/all");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al registrar el rol.";
            return $error;
        }
    }

    public function editRole($data)
    {
        if (preg_match($this->regExp["roleName"], $data["roleName"]) == 0) {
            $error = "El nombre del rol debe contener de 1 a 50 caracteres no numéricos.";
            return $error;
        }

        $rowsaffected = $this->roleModel->saveRole($data);

        if ($rowsaffected > 0) {
            $destino = $this->Env->Redirect("user/role/all");
            echo "<script>location.href='$destino';</script>";
        } else {
            $error = "Error al editar el rol.";
            return $error;
        }
    }

    public function deleteRole($data)
    {
        $rowsAffected = $this->roleModel->deleteRole($data);
        if ($rowsAffected > 0) {
            $destino = $this->Env->Redirect("user/role/all");
            echo "<script>location.href='$destino';</script>";
        }
    }

    public function destroyRole($roleId)
    {
        $rowsAffected = $this->roleModel->destroyRole($roleId);
        if ($rowsAffected > 0) {
            $destino = $this->Env->Redirect("user/role/all");
            echo "<script>location.href='$destino';</script>";
        }
    }


    public function getNextRoleId()
    {
        $nextId = $this->roleModel->getNextRoleId();
        return $nextId;
    }
}
