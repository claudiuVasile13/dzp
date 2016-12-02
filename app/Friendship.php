<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Friendship extends Model
{

    public $table = 'friendship';
    protected $primaryKey = 'friendship_id';
    protected $fillable = [
        'userID', 'friendID'
    ];
    private static $friendsArray = [];

    // Get all the users who are friends with this user
    public static function friends($userID)
    {
        $senderFriends = DB::table('friendship')
            ->join('users', 'friendship.userID', '=', 'users.user_id')
            ->where('friendID', $userID)
            ->select('users.username', 'users.user_id', 'users.profile_url_key', 'users.picture', 'users.rank')
            ->get();

        $receiverFriends = DB::table('friendship')
            ->join('users', 'friendship.friendID', '=', 'users.user_id')
            ->where('userID', $userID)
            ->select('users.username', 'users.user_id', 'users.profile_url_key', 'users.picture', 'users.rank')
            ->get();

        self::createFriendsArray($senderFriends);
        self::createFriendsArray($receiverFriends);
        return self::$friendsArray;
    }

    // Create the friends array by joining the elements of $senderFriends & $receiverFriends into $friendsArray
    public static function createFriendsArray($partialFriendsArray)
    {
        foreach ($partialFriendsArray as $friend) {
            array_push(self::$friendsArray, $friend);
        }
    }

}
