<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $name = "alireza";
        return $this->show(["view" => "index" , "params" =>["name" => $name]]);
    }

    public function add($param1, $param2)
    {
        return $this->show([$param1 + $param2 , $param1 - $param2]);
    }

}