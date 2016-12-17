<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public $table = 'ranks';
    protected $primaryKey = 'rank_id';
    protected $fillable = [
        'rank_name', 'rank_image', 'rank_color'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'rank_user', 'rankID', 'userID');
    }
}
