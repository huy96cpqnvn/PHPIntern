<?php

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
