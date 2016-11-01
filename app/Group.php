<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    public $table = 'groups';
    protected $primaryKey = 'group_id';
//    protected $fillable = ['userID', 'sessionID', 'purchased'];

    public function getUsers()
    {
        return $this->hasMany('App\Users','group_id');
    }
}
