<?php namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait RESTActions {

    public function all()
    {
        $model = self::MODEL;
        $data = $model::get();
        if ($model === "App\Task"){
            $data->load('priority','user');
        }
        return $this->respond(Response::HTTP_OK, $data->toArray());
    }

    public function get(Request $request, $id)
    {
        $model = self::MODEL;
        $data = $model::find($id);
        if(is_null($data)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        if ($model === "App\Task"){
            $data->load('priority','user');
        }
        return $this->respond(Response::HTTP_OK, $data->toArray());
    }

    public function add(Request $request)
    {
        $model = self::MODEL;
        $this->validate($request, $model::rules());
        if ($model === 'App\User'){
            $request['token'] = bcrypt($request->input('email'));
        }
        return $this->respond(Response::HTTP_CREATED, $model::create($request->all()));
    }

    public function put(Request $request, $id)
    {
        $model = self::MODEL;
        $this->validate($request, $model::rules($id));
        $model = $model::find($id);
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $model->update($request->all());
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function remove($id)
    {
        $model = self::MODEL;
        if(is_null($model::find($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $model::destroy($id);
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    public function restore($id)
    {
        $model = self::MODEL;
        $data = $model::withTrashed()->find($id);
        if (is_null($data)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $data->restore();
        return $this->respond(Response::HTTP_OK, $data);
    }

    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }

}
