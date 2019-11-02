<?php


class Request
{
    public $url;
    public $Controller = "Home";
    public $Method = "index";
    public $Params = array();

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
    }
}