<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendshipRequest extends Model
{

    public $table = 'friendship_requests';
    protected $primaryKey = 'friendship_request_id';
    protected $fillable = [
        'senderID', 'receiverID'
    ];

}
