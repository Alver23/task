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



$app->group(['prefix' => 'api'], function () use ($app) {
    $app->get('/', function () use ($app) {
        return $app->version();
    });
    $app->group(['prefix' => 'v1'], function () use ($app) {
        require __DIR__ . '/userRoutes.php';
        require __DIR__ . '/priorityRoutes.php';
        require __DIR__ . '/taskRoutes.php';
    });
});
