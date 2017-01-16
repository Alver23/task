<?php

namespace App;

use App\Traits\ModelUtil;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, ModelUtil;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'token',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'token',
        'ip_address',
        'owner_user_id',
        'updater_user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function rules($id = null)
    {
        return [
            'first_name' => 'required|max:80',
            'last_name' => 'required|max:80',
            'email' => 'required|email|unique:users,email,'.$id .',id',
        ];
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }


}
