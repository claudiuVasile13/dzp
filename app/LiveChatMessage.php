<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveChatMessage extends Model
{
    protected $fillable = [
        'live_chat_message_author', 'live_chat_message_body'
    ];
    public $table = 'live_chat_messages';
    protected $primaryKey = 'live_chat_message_id';

    public function author()
    {
        return $this->belongsTo('App\User', 'live_chat_message_author');
    }
}
