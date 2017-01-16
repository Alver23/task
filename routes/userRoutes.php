<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 14/01/17
 * Time: 07:39 PM
 */

$app->get('user', 'UsersController@all');
$app->get('user/{id}', 'UsersController@get');
$app->post('user', 'UsersController@add');
$app->put('user/{id}', 'UsersController@put');
$app->delete('user/{id}', 'UsersController@remove');
$app->post('user/{id}/restore', 'UsersController@restore');
$app->get('user/{id}/task', 'UsersController@task');