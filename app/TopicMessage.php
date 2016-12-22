<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicMessage extends Model
{
    protected $fillable = [
        'topicID', 'topic_message_body', 'topic_message_author'
    ];
    public $table = 'topic_messages';
    protected $primaryKey = 'topic_message_id';

    public function topic()
    {
        return $this->belongsTo('App\Topic', 'topicID');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'topic_message_author');
    }
}
