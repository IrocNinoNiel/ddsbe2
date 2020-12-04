<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;

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

// Api
$router->group(['prefix' => 'api'],function () use ($router) {
    $router->get('/users',['uses' => 'UserController@getUsers']);
    $router->get('/users/{id}',['uses' => 'UserController@getUser']);
    $router->post('/users/add',['uses' => 'UserController@addUsers']);
    $router->put('/users/update/{id}',['uses' => 'UserController@updateUser']);
    $router->delete('/users/delete/{id}',['uses' => 'UserController@deleteUser']);

    // UserJob
    $router->get('/usersjob','UserJobController@index');
    $router->get('/userjob/{id}','UserJobController@show');
});


$router->get('/login',['uses' => 'PagesController@login']);
$router->get('/dashboard',['uses' => 'PagesController@dashboard']);