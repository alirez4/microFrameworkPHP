<?php

namespace Core\Config;

/*
 * Define All Basic Constants
 * and Define Developer's Constants
 * */

class Definer
{
    public function __construct()
    {
        //Define the Base Directory
        $baseDir = $_SERVER['SCRIPT_FILENAME'];
        $baseDir = str_replace('index.php', '', $baseDir);

        define('BASE_DIR', $baseDir);

        //Define the Base URL
        $baseUrl = $_SERVER['SCRIPT_NAME'];
        $baseUrl = str_replace('index.php', '', $baseUrl);

        define('BASE_URL', $baseUrl);

        //Define Developer's Constants
        $constFile = $baseDir . ".env";

        $consts = fopen($constFile, 'r+');
        while ($line = fgets($consts)) {
            $line = trim($line);

            //Ignore Comment and empty lines
            if ($line != "" and $line[0] != "#") {
//                var_dump($line);

                $line = explode("=" , $line);

                define(trim($line[0]) , trim($line[1]));
            }
        }
    }
}