<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $table = 'groups';
    protected $primaryKey = 'group_id';
    protected $fillable = [
        'group_name', 'group_logo'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'group_user', 'userID', 'groupID');
    }
}
