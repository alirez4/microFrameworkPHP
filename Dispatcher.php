<?php

use Core\Log;

class Dispatcher
{
    public $request;
    public $url;
    public $userAgent;

    //Dependency Injection
    public function __construct(Request $request)
    {
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
        $this->request = $request;
        $this->url = trim($this->request->url, "/");
    }

    public function dispatch()
    {
        //Save Log in files
        $log = new Log($this->url, $this->userAgent);
        $log->addLogFile();

        //call controller
        $controller = $this->loadController();

        //class->method
        $data = call_user_func_array([$controller, $this->request->Method], $this->request->Params);

        $this->show($data);

    }

    public function loadController()
    {
        //create controller namespace
        $controllerAddress = "\App\Controllers\\";

        //fully qualified controller name
        $controllerName = $controllerAddress . $this->request->Controller;

        //controller file address
        $fileAddress = BASE_DIR . "App/Controllers/" . $this->request->Controller . ".php";
        $fileAddress = str_replace("\\", DIRECTORY_SEPARATOR, $fileAddress);

        //include controller
        require_once $fileAddress;

        //instantiation
        return new $controllerName;

    }

    public function show($data)
    {
        //return string for view
        if ($data[1] == "str") {
            echo $data[0];
        }
        //return array
        elseif ($data[1] == "array") {
            $i = 1;
            $myObj = new stdClass();
            foreach ($data[0] as $value) {
                $name = "param" . $i;
                $myObj->$name = $value;
                $i++;
            }
            $myJSON = json_encode($myObj);
            echo $myJSON;
        } elseif ($data[1] == "view") {
            if (isset($data[0]["params"])) {
                extract($data[0]["params"]);
            }
            ob_start();
            $fileName = BASE_DIR . "App/Views/" . $data[0]["view"] . ".php";
            include_once $fileName;
        }
    }
}