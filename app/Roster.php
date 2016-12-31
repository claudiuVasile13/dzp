<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    protected $fillable = [
        'section', 'name', 'location_name', 'location_flag', 'ranks', 'gameranger_id', 'status'
    ];
    public $table = 'roster';
    protected $primaryKey = 'member_id';
}
