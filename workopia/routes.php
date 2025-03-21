<?php

// $router->get('/', 'controllers/home.php');
// $router->get('/listings', 'controllers/listings/index.php');
// $router->get('/listings/create', 'controllers/listings/create.php');
// $router->get('/listing', 'controllers/listings/show.php');

// The idea is that we pass the place and then the function.
$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create', ['auth']);
$router->get('/listings/edit/{id}', 'ListingController@edit', ['auth']);
// Search needs to be here due to the way we route. If listings/id is above it, it assumes that keyword & location params are the id.
$router->get('/listings/search', 'ListingController@search');
$router->get('/listings/{id}', 'ListingController@listing');

$router->post('/listings', 'ListingController@store', ['auth']);

$router->put('/listings/{id}', 'ListingController@update', ['auth']);

$router->delete('/listings/{id}', 'ListingController@destroy', ['auth']);

// User controller

$router->get('/auth/register', 'UserController@create', ['guest']);
$router->get('/auth/login', 'UserController@login', ['guest']);

$router->post('/auth/register', 'UserController@store', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);
$router->post('/auth/login', 'UserController@authenticate', ['guest']);