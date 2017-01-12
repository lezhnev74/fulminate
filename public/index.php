<?php
use Carbon\Carbon;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__."/../bootstrap.php";


//
// HTTP routes
//
$app->get('/', function(Request $request, Response $response) {
    
    $response->getBody()->write("Ok");
    
    return $response;
});

$app->run();
