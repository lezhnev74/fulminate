<?php
require __DIR__."/vendor/autoload.php";
require __DIR__ . "/src/helpers.php";


//////////////////////////////////////////////////////
// SLIM FRAMEWORK init
$config    = require __DIR__ . "/config/fulminate.php";
$app       = new \Slim\App(["settings" => $config]);
$container = $app->getContainer();

/////////////////////////////////////////////////////
//
// INIT DI
//
require __DIR__ . "/src/Service/Application/AppServiceProvider.php";