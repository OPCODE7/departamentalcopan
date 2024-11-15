<?php
class RoleModel
{
    private $ConMySql;

    public function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/models/DbConnectionModel.php");
        $this->ConMySql = Connect::ConnectMysql();
    }


    public function getRoles($del)
    {
        try {
            $query = "CALL SP_GET_ROLES($del)";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->execute();
            $recordset = $stmt->fetchAll();
            return $recordset;
        } catch (PDOException $error) {
            echo $error->getmessage();
        }
    }

    public function getRole($roleId)
    {
        try {
            $query = "CALL SP_GET_ROLE($roleId)";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->execute();
            $recordset = $stmt->fetch();
            return $recordset;
        } catch (PDOException $error) {
            echo $error->getmessage();
        }
    }

    public function saveRole($data)
    {
        try {
            $query = "CALL SP_SAVE_ROLE('{$data['roleName']}')";
            $stmt = $this->ConMySql->prepare($query);
            $ra = $stmt->execute();
            return $ra;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    public function updateRole($data)
    {
        try {
            $query = "CALL SP_EDIT_ROLE('{$data['roleId']}','{$data['roleName']}')";
            $stmt = $this->ConMySql->prepare($query);
            $ra = $stmt->execute();
            return $ra;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function getNextRoleId()
    {
        try {
            $query = "CALL SP_GET_NEXT_ID_USER_ROLES()";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->execute();
            $recordset = $stmt->fetch();
            return $recordset["NEXT_ID"];
        } catch (PDOException $error) {
            echo $error->getmessage();
        }
    }

    public function deleteRole($data)
    {
        try {
            $query = "CALL SP_MARK_DEL_ROLE('{$data['roleId']}','{$data['del']}')";
            $stmt = $this->ConMySql->prepare($query);
            $ra = $stmt->execute();
            return $ra;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function destroyRole($roleId)
    {
        try {
            $query = "CALL SP_DESTROY_ROLE($roleId);";
            $stmt = $this->ConMySql->prepare($query);
            $ra = $stmt->execute();
            return $ra;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
