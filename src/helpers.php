<?php

//////////////////////////////////////////////////////
// .env loader
$dotenv = new \Dotenv\Dotenv(__DIR__ . "/../");
$dotenv->load();
// helper function to get env or default value
function env($var_name, $default = null)
{
    $result = getenv($var_name);
    
    if($result === false) {
        return $default;
    }
    
    return $result;
}

//
// Path helpers
//
function storage_path($sub_path = '')
{
    return __DIR__ . "/../storage/" . $sub_path;
}


//
// Access DI container
//
function get_container()
{
    global $container;
    
    return $container;
}

//
// Log helpers
//
function log_info($message, $context = [])
{
    get_container()->logger->addInfo($message, $context);
}

function log_error($message, $context = [])
{
    get_container()->logger->addError($message, $context);
}



