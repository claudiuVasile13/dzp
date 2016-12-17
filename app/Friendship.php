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
            ->join('rank_user', 'users.user_id', '=', 'rank_user.userID')
            ->join('ranks', 'ranks.rank_id', 'rank_user.rankID')
            ->where('friendship.friendID', $userID)
            ->where('rank_user.main_rank', '=', 1)
            ->select('users.username', 'users.user_id', 'users.user_image', 'ranks.rank_image', 'ranks.rank_color')
            ->get();

        $receiverFriends = DB::table('friendship')
            ->join('users', 'friendship.friendID', '=', 'users.user_id')
            ->join('rank_user', 'users.user_id', '=', 'rank_user.userID')
            ->join('ranks', 'ranks.rank_id', 'rank_user.rankID')
            ->where('friendship.userID', $userID)
            ->where('rank_user.main_rank', '=', 1)
            ->select('users.username', 'users.user_id', 'users.user_image', 'ranks.rank_image', 'ranks.rank_color')
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
