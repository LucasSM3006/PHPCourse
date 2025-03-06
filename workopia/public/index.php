<?php
require __DIR__ . '/../vendor/autoload.php';

use Framework\Router;
use Framework\Session;

Session::startSession();

require '../helpers.php';

// require basePath('Framework/Router.php');
// require basePath('Framework/Database.php');

/* Code below does the same as the two requires above. */

// Will autoload whatever is in Framework/.
// spl_autoload_register(function ($class) {
//     $path = basePath('Framework/' . $class . '.php');
//     if(file_exists($path))
//     {
//         require $path;
//     }
// });

$router = new Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->route($uri);