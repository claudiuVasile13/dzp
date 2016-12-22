<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'topicCategoryID', 'topic_author', 'topic_name', 'topic_description'
    ];
    public $table = 'topics';
    protected $primaryKey = 'topic_id';

    public function category()
    {
        return $this->belongsTo('App\TopicCategory', 'topicCategoryID');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'topic_author');
    }

    public function messages()
    {
        return $this->hasMany('App\TopicMessage', 'topicID');
    }
}
