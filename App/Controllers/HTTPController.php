<?php


namespace App\Controllers;


use Core\Controller;

class HTTPController extends Controller
{
    public function NotFound()
    {
        include "Core/View/404.html";
    }

}