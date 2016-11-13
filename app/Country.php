<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $table = 'countries';
    public $timestamps = false;
    protected $primaryKey = 'country_id';
    protected $fillable = [
        'country_name', 'country_flag'
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'countryID');
    }
}
