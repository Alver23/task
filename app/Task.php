<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Traits
 */
use App\Traits\ModelUtil;

class Task extends Model {

    use ModelUtil;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'priority_id',
        'name',
        'description',
        'due_date'
    ];

    protected $dates = [
        'create_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'ip_address',
        'owner_user_id',
        'updater_user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Reglas de valudacion para el create y el update
     * @param string $method
     * @return array
     */
    public static function rules($method = 'POST')
    {
        $rules = ($method === 'POST') ? 'required|' : '';
        return [
            'user_id' => $rules . 'integer',
            'priority_id' => $rules .'integer',
            'name' => $rules .'max:80',
            'due_date' => $rules .'date_format:Y-m-d',
        ];
    }

    /**
     * Relacion con Priority
     * @return mixed
     */
    public function priority()
    {
        return $this->belongsTo('App\Priority')->withTrashed();
    }

    /**
     * Relacion con user
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User')->withTrashed();
    }


}
