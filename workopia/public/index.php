<?php

require '../helpers.php';

$routes = 
[
    '/' => 'controllers/home.php', // home
    '/listings' => 'controllers/listings/index.php', // gets all listings
    '/listings/create' => 'controllers/listings/create.php', // create
    '404' => 'controllers/error/404.php' // error page
];

$uri = $_SERVER['REQUEST_URI'];

if(array_key_exists($uri, $routes))
{
    require basePath($routes[$uri]);
}
else
{
    require basePath($routes['404']);
}