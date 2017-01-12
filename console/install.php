<?php

require __DIR__ . "/../bootstrap.php";

// TODO make nice installer flow

// Now run installation
$db_settings = $container->settings['db'];

//
// 1. Make up a database file in case of SQLITE driver
//
if($db_settings['default_driver'] == "sqlite") {
    $dir = dirname($db_settings['sqlite']['path']);
    if(!is_writable($dir)) {
        throw new Exception("Unable to init a new Sqlite database file, directory is unwritable: " . $dir);
    }
    touch($db_settings['sqlite']['path']);
}

//
// Init database tables
//
//$container->db->exec("CREATE TABLE Dogs (Id INTEGER PRIMARY KEY, Breed TEXT, Name TEXT, Age INTEGER)");