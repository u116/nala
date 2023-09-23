<?php

use Src\Routes\Router;

$start = microtime(true);

const BASE_PATH = __DIR__ . '/../';
const DIR = __DIR__ . '/';

require BASE_PATH . 'src/helpers.php';


spl_autoload_register(function ($class) {
    $file = path(str_replace('\\', DIRECTORY_SEPARATOR, lcfirst($class)) . '.php');
    if (file_exists($file)) {
        require $file;
    } else {
        exit($file);
    }
});

$router = new Router;

$web = $router->route($_POST['_method'] ?? $_SERVER['REQUEST_METHOD']);

$excTime = round((microtime(true) - $start) * 1000) . "ms";

require $web['base'];