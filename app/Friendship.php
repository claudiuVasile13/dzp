<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{

    public $table = 'friendship';
    protected $primaryKey = 'friendship_id';
    protected $fillable = [
        'userID', 'friendID'
    ];

}
