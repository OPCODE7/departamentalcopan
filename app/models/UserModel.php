<?php
class UserModel
{
    private $ConMySql;

    public function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/models/DbConnectionModel.php");
        $this->ConMySql = Connect::ConnectMysql();
    }


    public function getUser($userId)
    {
        try {
            $query = "CALL SP_GET_USER('{$userId}')";
            $stmt = $this->ConMySql->prepare($query);

            $stmt->execute();
            $recordset = $stmt->fetch();
            return $recordset;
        } catch (PDOException $error) {
            echo $error->getmessage();
        }
    }

    public function updateUser($data)
    {
        try {
            $query = "CALL SP_EDIT_USER('{$data['userId']}', '{$data['firstName']}', '{$data['lastName']}','{$data['email']}','{$data['newPwd']}','{$data['roleId']}','{$data['state']}')";

            $stmt = $this->ConMySql->prepare($query);

            $ra = $stmt->execute();
            return $ra;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
