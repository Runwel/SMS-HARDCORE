<?php
session_start();

spl_autoload_register(function ($class){
    $paths = [
        __DIR__ . "/../controller/$class.php",
        __DIR__ . "/../model/$class.php",
        __DIR__ . "/../core/$class.php",
        __DIR__ . "/../modules/fields/$class.php",
        __DIR__ . "/../helpers/$class.php",
    ];

    foreach ($paths as $file){
        if (file_exists($file)){
            require_once $file;
            return;
        }
    }
});

if (file_exists(__DIR__ . '/../.env')){
    $envFile = __DIR__ . '/../.env';
} elseif (file_exists(__DIR__ . '/../.env.production')){
    $envFile = __DIR__ . '/../.env.production';
}

Env::load($envFile);

$appDebug = Env::get('APP_DEBUG', 'false') === 'true';

if ($appDebug){
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
    ini_set('error_log', __DIR__ . '/../logs/error.log');
}

define('APP_ENV', Env::get('APP_ENV'));
define('DB_HOST', Env::get('DB_HOST'));
define('DB_NAME', Env::get('DB_NAME'));
define('DB_USER', Env::get('DB_USER'));
define('DB_PASSWORD', Env::get('DB_PASSWORD'));
define('BASE_URL', Env::get('BASE_URL'));