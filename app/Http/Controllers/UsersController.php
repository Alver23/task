<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use App\Traits\RESTActions;

class UsersController extends Controller {

    const MODEL = "App\User";

    use RESTActions;

    public function task($id)
    {
        $user = User::find($id);
        if (is_null($user)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $user->load('tasks');
        $user->tasks->load('priority');
        return $this->respond(Response::HTTP_OK, $user->toArray());
    }
}

