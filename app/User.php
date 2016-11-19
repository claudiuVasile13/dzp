<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'countryID', 'admin', 'member', 'email', 'username', 'password', 'activated', 'registration_token', 'password_reset_token',
        'rank', 'status', 'reputation', 'birthday', 'job_hobbies', 'description', 'gameranger_id',
        'gender', 'skype', 'facebook', 'twitter', 'picture', 'signature', 'user_ip',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $table = 'users';
    protected $primaryKey = 'user_id';

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'group_user', 'userID', 'groupID');
    }

    public function topics()
    {
        return $this->hasMany('App\Topic', 'topic_author');
    }

    public function topicMessages()
    {
        return $this->hasMany('App\TopicMessage', 'topic_message_author');
    }

    public function liveChatMessages()
    {
        return $this->hasMany('App\LiveChatMessage', 'live_chat_message_author');
    }

    public function privateMessages()
    {
        return $this->hasMany('App\PrivateMessage', 'pm_author');
    }

    public function country()
    {
        return $this->belongsTo('App\Country', 'countryID');
    }
}
