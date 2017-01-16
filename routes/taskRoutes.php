<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 15/01/17
 * Time: 12:05 AM
 */

/**
 * Routes for resource task
 */
$app->get('task', 'TasksController@all');
$app->get('task/{id}', 'TasksController@get');
$app->post('task', 'TasksController@add');
$app->put('task/{id}', 'TasksController@put');
$app->delete('task/{id}', 'TasksController@remove');
$app->post('task/{id}/restore', 'TasksController@restore');