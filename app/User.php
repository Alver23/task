<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * Traits
 */
use App\Traits\ModelUtil;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, ModelUtil;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
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


    /**
     * * Reglas de valudacion para el create y el update
     * @param string $method
     * @param integer $id
     * @return array
     */
    public static function rules($method = 'POST', $id = null)
    {
        $ruleName = ($method === 'POST') ? 'required|max:80' : 'max:80';
        $ruleEmail = ($method === 'POST') ? 'required|' : '';
        return [
            'first_name' => $ruleName,
            'last_name' => $ruleName,
            'email' => $ruleEmail . 'email|unique:users,email,'.$id .',id',
        ];
    }

    /**
     * Relacion con tareas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
