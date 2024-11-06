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
            "nameAndLastName" => "/^[a-zA-ZÀ-ȳ\s]{1,50}$/",
            "state" => "/^[01]$/",
            "userRole" => "/[0-9]/"
        ];
    }


    public function getUser($userId)
    {
        $recordset = $this->userModel->getUser($userId);
        return $recordset;
    }
}
