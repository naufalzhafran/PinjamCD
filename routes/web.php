<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Login and Register
$router->post("/register", "AuthController@register");
$router->post("/login", "AuthController@login");

// API
$router->group(['prefix'=>'api/'], function() use($router){

    // CD API
    $router->get('/cds', 'CDController@index');
    $router->post('/cd', 'CDController@create');
    $router->get('/cd/{id}', 'CDController@show');
    $router->put('/cd/{id}', 'CDController@update');
    $router->delete('/cd/{id}', 'CDController@destroy');

    // RENT API
    $router->post('/rent', 'RentController@borrow');
    $router->post('/rent/return', 'RentController@return');
    });