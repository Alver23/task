<?php

namespace App\Http\Controllers;

/**
 * Traits
 */
use App\Traits\RESTActions;

class TasksController extends Controller {

    const MODEL = "App\Task";

    use RESTActions;

}
