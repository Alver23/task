<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelUtil;

class Priority extends Model
{
    use ModelUtil;
    protected $fillable = ["name", "description"];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
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

    public static function rules()
    {
        return [
            'name' => 'required|max:80',
        ];
    }
}
