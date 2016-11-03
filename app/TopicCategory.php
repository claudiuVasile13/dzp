<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCategory extends Model
{
    protected $fillable = [
        'parentID', 'topic_category_name', 'topic_category_description'
    ];
    public $table = 'topic_categories';
    protected $primaryKey = 'topic_category_id';

    public function topics()
    {
        return $this->hasMany('App\Topic', 'topicCategoryID');
    }
}
