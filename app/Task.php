<?php namespace App;

use App\Traits\ModelUtil;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    use ModelUtil;

    protected $fillable = ["user_id", "priority_id", "name", "description", "due_date"];

    protected $dates = ["create_at", "updated_at", "deleted_at"];

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
            "user_id" => "required|integer",
            "priority_id" => "required|integer",
            "name" => "required|max:80",
            "due_date" => "required|date_format:Y-m-d",
        ];
    }

    public function priority()
    {
        return $this->belongsTo("App\Priority")->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withTrashed();
    }


}
