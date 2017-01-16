<?php namespace App\Http\Controllers;

use Illuminate\Http\Response;

/**
 * Models
 */
use App\User;

/**
 * Traits
 */
use App\Traits\RESTActions;

class UsersController extends Controller {

    const MODEL = "App\User";

    use RESTActions;

    /**
     * Obtenemos las tareas asociadas al usuario
     * @param integer $id
     * @return mixed
     */
    public function task($id)
    {
        $user = User::find($id);
        if (is_null($user)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $user->load('tasks');
        if (! is_null($user->tasks)) {
            $user->tasks->load('priority');
        }
        return $this->respond(Response::HTTP_OK, $user->toArray());
    }
}

