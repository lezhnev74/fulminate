<?php

//
// Set logger
//
$container['logger'] = function($c) {
    $logger       = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler(storage_path("logs/app.log"));
    $logger->pushHandler($file_handler);
    
    return $logger;
};


//
// Set DB connection
//
$container['db'] = function($c) {
    $db = $c['settings']['db'];
    
    if($db['default_driver'] == 'mysql') {
        $pdo = new PDO("mysql:host=" . $db['mysql']['host'] . ";dbname=" . $db['mysql']['dbname'], $db['mysql']['user'],
                       $db['mysql']['pass']);
    } elseif($db['default_driver'] == 'sqlite') {
        $pdo = new PDO('sqlite:' . $db['sqlite']['path']);
    } else {
        throw new Exception("Default DB driver was not recognized");
    }
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    return $pdo;
};