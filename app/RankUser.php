<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankUser extends Model
{

    protected $fillable = [
        'userID', 'rankID', 'main_rank'
    ];

    public $table = 'rank_user';
    protected $primaryKey = 'rank_user_id';

}
