<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FriendshipRequest extends Model
{

    public $table = 'friendship_requests';
    protected $primaryKey = 'friendship_request_id';
    protected $fillable = [
        'senderID', 'receiverID'
    ];

    // Get all the users who sent friendship request to a specific user
    public static function senders($receiverID)
    {
        $friendshipNotificationsSenders = DB::table('friendship_requests')
                                            ->join('users', 'friendship_requests.senderID', '=', 'users.user_id')
                                            ->where('receiverID', $receiverID)
                                            ->select('users.username', 'users.user_id', 'users.user_image')
                                            ->get();
        return $friendshipNotificationsSenders;
    }

}
