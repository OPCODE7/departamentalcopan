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
}
