<?php

// create Path of .env file
$path = $_SERVER["SCRIPT_FILENAME"];
$path = str_replace("index.php", "", $path) . ".env";

// Open .env File for reading data
$consts = fopen($path, 'r');

// Reading data and define
while ($line = fgets($consts)) {
    $line = trim($line);
    if ($line){
        $line = explode('=', $line);
        define(trim($line[0]), trim($line[1]));

    }
}
