<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Traits
 */
use App\Traits\ModelUtil;

class Priority extends Model
{
    use ModelUtil;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
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
        'ip_address',
        'owner_user_id',
        'updater_user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Reglas de valudacion para el create y el update
     * @return array
     */
    public static function rules()
    {
        return [
            'name' => 'required|max:80',
        ];
    }
}
