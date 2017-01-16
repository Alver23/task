<?php namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait RESTActions {

    /**
     * Obtenemos todos los registros del modelo
     * @return mixed
     */
    public function all()
    {
        $model = self::MODEL;
        $data = $model::get();
        if ($model === "App\Task"){
            $data->load('priority','user');
        }
        return $this->respond(Response::HTTP_OK, $data->toArray());
    }

    /**
     * Obtenemos el registro por id
     * @param Request $request
     * @param integer $id
     * @return mixed
     */
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

    /**
     * Agregamos un nuevo registro
     * @param Request $request
     * @return mixed
     */
    public function add(Request $request)
    {
        $model = self::MODEL;
        $this->validate($request, $model::rules());
        if ($model === 'App\User'){
            $request['token'] = bcrypt($request->input('email'));
        }
        return $this->respond(Response::HTTP_CREATED, $model::create($request->all()));
    }

    /**
     * Actualizamos el registro por id
     * @param Request $request
     * @param integer $id
     * @return mixed
     */
    public function put(Request $request, $id)
    {
        $model = self::MODEL;
        $this->validate($request, $model::rules('PUT', $id));
        $model = $model::find($id);
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $model->update($request->all());
        return $this->respond(Response::HTTP_OK, $model);
    }

    /**
     * Eliminamos el registro por id
     * @param integer $id
     * @return mixed
     */
    public function remove($id)
    {
        $model = self::MODEL;
        if(is_null($model::find($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $model::destroy($id);
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    /**
     * Restauramos el registro por id
     * @param integer $id
     * @return mixed
     */
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

    /**
     * Deveolvemos la respuesta en formato json con el status y data
     * @param integer $status
     * @param array $data
     * @return mixed
     */
    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }

}
