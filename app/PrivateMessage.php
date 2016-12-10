<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $fillable = [
        'pm_author', 'pm_receiver', 'pm_title', 'pm_body', 'status'
    ];
    public $table = 'private_messages';
    protected $primaryKey = 'pm_id';

    public function author()
    {
        return $this->belongsTo('App\User', 'pm_author');
    }
}
