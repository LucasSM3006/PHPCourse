<?php

// $router->get('/', 'controllers/home.php');
// $router->get('/listings', 'controllers/listings/index.php');
// $router->get('/listings/create', 'controllers/listings/create.php');
// $router->get('/listing', 'controllers/listings/show.php');

// The idea is that we pass the place and then the function.
$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create');
$router->get('/listings/edit/{id}', 'ListingController@edit');
$router->get('/listings/{id}', 'ListingController@listing');

$router->post('/listings', 'ListingController@store');

$router->put('/listings/{id}', 'ListingController@update');

$router->delete('/listings/{id}', 'ListingController@destroy');

// User controller

$router->get('/auth/register', 'UserController@create');
$router->get('/auth/login', 'UserController@login');

$router->post('/auth/register', 'UserController@store');
$router->post('/auth/logout', 'UserController@logout');