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

$router->group(['prefix' => 'api'], function($router){
    $router->get('article', 'ArticleController@showAllArticle');
    $router->get('article/{id}', 'ArticleController@showOneArticle');
    $router->post('article', 'ArticleController@create');
    $router->put('article/{id}', 'ArticleController@update');
    $router->delete('article/{id}', 'ArticleController@delete');

});