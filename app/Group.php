<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $table = 'groups';
    protected $primaryKey = 'group_id';
    protected $fillable = [
        'group_name'
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'groupID');
    }
}
