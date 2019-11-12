<?php


class Request
{
    public $url;
    public $Controller = "HTTPController";
    public $Method = "NotFound";
    public $Params = array();

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
    }

    public function add($patern, $method, array $params = null)
    {
        if ($patern == $this->url) {

            $method = explode("@", $method);

            $this->Controller = $method[0];
            $this->Method = $method[1];
            $this->Params = $params == null ? array() : $params;

        }
    }
}