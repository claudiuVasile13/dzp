<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function receivedPM($user_id)
    {
        $receivedPM = DB::table('private_messages')
                        ->join('users', 'private_messages.pm_author', '=', 'users.user_id')
                        ->where('private_messages.pm_receiver' ,'=', $user_id)
                        ->select('users.username', 'users.profile_url_key', 'private_messages.*')
                        ->get();
        return $receivedPM;
    }

    public static function sentPM($user_id)
    {
        $sentPM = DB::table('private_messages')
            ->join('users', 'private_messages.pm_receiver', '=', 'users.user_id')
            ->where('private_messages.pm_author' ,'=', $user_id)
            ->select('users.username', 'users.profile_url_key', 'private_messages.*')
            ->get();
        return $sentPM;
    }
}
