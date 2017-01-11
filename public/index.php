<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require "../vendor/autoload.php";

//////////////////////////////////////////////////////
// .env loader
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
// helper function to get env or default value
function env($var_name, $default = null)
{
    return getenv($var_name) ?? $default;
}

//////////////////////////////////////////////////////
// SLIM FRAMEWORK init
$app = new \Slim\App();
// routes
$app->get('/', function(Request $request, Response $response) {
    
    
    return $response;
});

$app->run();
