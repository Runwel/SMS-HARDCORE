<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define("BASE_URL", "");

define("DB_HOST", "localhost");
define("DB_NAME", "eduportal");
define("DB_USER", "root");
define("DB_PASSWORD", "");

spl_autoload_register(function ($class){
    $paths = [
        __DIR__ . "/../controller/$class.php",
        __DIR__ . "/../model/$class.php",
        __DIR__ . "/../core/$class.php",
    ];

    foreach ($paths as $file){
        if (file_exists($file)){
            require_once $file;
            return;
        }
    }
});