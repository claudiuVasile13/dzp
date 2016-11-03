<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public $table = 'matches';
    protected $primaryKey = 'match_id';
    protected $fillable = [
        'opponent', 'result', 'score', 'screenshots'
    ];
}
