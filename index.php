<?php
include "autoload.php";

$definer = new \Core\Config\Definer();

$request = new Request();

include "routing.php";

$dispatcher = new Dispatcher($request);

$dispatcher->dispatch();