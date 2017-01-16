<?php

namespace App\Http\Controllers;

use App\Traits\RESTActions;

class TasksController extends Controller {

    const MODEL = "App\Task";

    use RESTActions;

}
