<?php
include "autoload.php";
include "Core/Config/env.php";

$request = new Request();

$dispatcher = new Dispatcher($request);

$dispatcher->dispatch();