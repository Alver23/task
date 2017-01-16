<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 14/01/17
 * Time: 11:01 PM
 */

$app->get('priority', 'PrioritiesController@all');
$app->get('priority/{id}', 'PrioritiesController@get');
$app->post('priority', 'PrioritiesController@add');
$app->put('priority/{id}', 'PrioritiesController@put');
$app->delete('priority/{id}', 'PrioritiesController@remove');
$app->post('priority/{id}/restore', 'PrioritiesController@restore');