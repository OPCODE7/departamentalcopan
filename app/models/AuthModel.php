<?php

class AuthModel
{
    private $ConMySql;

    public function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/models/DbConnectionModel.php");
        $this->ConMySql = Connect::ConnectMysql();
    }

    public function CheckLogin($username)
    {
        try {
            $query = "CALL SP_CHECK_LOGIN('{$username}')";
            $stmt = $this->ConMySql->prepare($query);


            $stmt->execute();
            $recordset = $stmt->fetch();
            return $recordset;
        } catch (PDOException $error) {
            echo $error->getmessage();
        }
    }

    public function SaveUser($data)
    {
        try {
            $ra = 0;
            $encryptPwd = sha1($data["pwd"]);
            $query = "CALL SP_INSERT_USER('{$data["firstName"]}','{$data["userName"]}','{$data["email"]}','{$encryptPwd}','{$data["lastName"]}')";

            $stmt = $this->ConMySql->prepare($query);

            $ra = $stmt->execute();

            if ($ra > 0) {
                return $ra;
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function updateUserPwd($data)
    {
        try {
            $ra = 0;
            $encryptPwd = sha1($data["pwd"]);
            $query = "CALL SP_RESET_USER_PWD('{$data["userId"]}','$encryptPwd')";

            $stmt = $this->ConMySql->prepare($query);

            $ra = $stmt->execute();
            return $ra;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    public function UpdateRecoveryPassCode($data)
    {
        try {
            $ra = 0;
            $query = "CALL SP_SET_PASS_RECOVERYCODE('{$data["newCode"]}','{$data["currentAttemps"]}','{$data["userId"]}')";

            $stmt = $this->ConMySql->prepare($query);

            $ra = $stmt->execute();

            if ($ra > 0) {
                return $ra;
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function checkExistAccount($data)
    {
        try {
            $query = "CALL SP_CHECK_EXIST_ACCOUNT('{$data}')";
            $stmt = $this->ConMySql->prepare($query);

            $stmt->execute();
            $recordset = $stmt->fetch();
            return $recordset;
        } catch (PDOException $error) {
            echo $error->getmessage();
        }
    }

    public function updateTimerRecoveryPwd($userId, $control)
    {
        try {
            $query = "CALL SP_UPDATE_RECOVERY_PWD_TIMER('{$userId}', '{$control}');";
            echo $control;
            $stmt = $this->ConMySql->prepare($query);
            $ra = $stmt->execute();
            return $ra;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function checkLastTimeRecoveryPwd($userId)
    {
        try {
            $query = "CALL SP_CHECK_RECOVERY_PWD_TIMER('{$userId}')";
            $stmt = $this->ConMySql->prepare($query);
            $stmt->execute();
            $recordset = $stmt->fetch();
            return $recordset;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
