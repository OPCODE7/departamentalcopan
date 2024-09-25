<?php
class Env
{
    private $APP_NAME;
    private $APP_URL;

    public function __construct()
    {
        $this->APP_URL = "http://localhost/departamentalcopan/";
        $this->APP_NAME = "departamentalcopan";
    }


    public function Redirect($path)
    {
        $redirect_to = $this->APP_URL . $path;
        return $redirect_to;
    }
}
