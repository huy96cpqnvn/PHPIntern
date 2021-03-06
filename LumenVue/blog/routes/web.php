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

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});
$router->group(['prefix' => 'api'], function ($router){

    $router->get('category', 'CategoryController@showCategory');
    $router->get('category/{id}', 'CategoryController@showOneCategory');
    $router->post('category', 'CategoryController@addCategory');
    $router->put('category/{id}', 'CategoryController@updateCategory');
    $router->delete('category/{id}', 'CategoryController@deleteCategory');
    $router->get('category/search/{search}', 'CategoryController@searchCategory');

    $router->get('news', 'NewsController@showNews');
    $router->get('news/{id}', 'NewsController@showOneNews');
    $router->post('news', 'NewsController@addNews');
    $router->put('news/{id}', 'NewsController@updateNews');
    $router->delete('news/{id}', 'NewsController@deleteNews');
    $router->get('list-by-status/{status}', 'NewsController@showNewsByStatus');
    $router->get('news/search/{search}', 'NewsController@searchNews');

//    Login, register, logout
    $router->post('register', 'AuthController@register');

    // Matches "/api/login
    $router->post('login', 'AuthController@login');

    // Matches "/api/profile
    $router->get('profile', 'UserController@profile');

    // Matches "/api/users/1
    //get one user by id
    $router->get('users/{id}', 'UserController@singleUser');

    // Matches "/api/users
    $router->get('users', 'UserController@allUsers');

    //Send reset password mail
    $router->post('reset-password', 'AuthController@sendPasswordResetLink');

    //handle reset password form process
    $router->post('reset/password', 'AuthController@callResetPassword');

    //change password
    $router->post('change-password', 'AuthController@changePassword');
});
//$router->group(['middleware' => 'auth:api'], function (){
//    $router->post('change-password', 'AuthController@changePassword');
//});

$router->get('/{route:.*}/', function ()  {
    return view('app');
});
