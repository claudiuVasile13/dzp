<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{

    protected $fillable = [
        'groupID', 'userID'
    ];

    public $table = 'group_user';
    protected $primaryKey = 'group_user_id';

}
