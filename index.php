<?php
include "autoload.php";

$definer = new \Core\Config\Definer();

$request = new Request();

$dispatcher = new Dispatcher($request);

$dispatcher->dispatch();