# API NestDots Task

La API cuenta con un usuario para realizar las peticiones.

- First Name: Demo
- Last Name: Demo
- Email: demo@demo.com
- Token: 4oigKQThQfilJH0077+VT+WJu3DcSeuk4peE4gRI+Nw=

## Metodos disponibles

Todos los metodos realizados deben llevar un header en la
peticion (token = value), el cual permite consumir cualquier metodo.
 
- GET
- POST
- PUT
- DELETE

### Rutas disponibles.

#### Rutas para usuarios

```php
$app->get('user', 'UsersController@all');
$app->get('user/{id}', 'UsersController@get');
$app->post('user', 'UsersController@add');
$app->put('user/{id}', 'UsersController@put');
$app->delete('user/{id}', 'UsersController@remove');
$app->post('user/{id}/restore', 'UsersController@restore');
$app->get('user/{id}/task', 'UsersController@task');
```

#### Rutas para prioridades

```php
$app->get('priority', 'PrioritiesController@all');
$app->get('priority/{id}', 'PrioritiesController@get');
$app->post('priority', 'PrioritiesController@add');
$app->put('priority/{id}', 'PrioritiesController@put');
$app->delete('priority/{id}', 'PrioritiesController@remove');
$app->post('priority/{id}/restore', 'PrioritiesController@restore');
```

#### Rutas para las tareas

```php
$app->get('task', 'TasksController@all');
$app->get('task/{id}', 'TasksController@get');
$app->post('task', 'TasksController@add');
$app->put('task/{id}', 'TasksController@put');
$app->delete('task/{id}', 'TasksController@remove');
$app->post('task/{id}/restore', 'TasksController@restore');
```