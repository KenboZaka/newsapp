<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Article extends Model
{
    protected $fillable=[
        'title','content'
    ];

    

    public function posts(){
        return $this->hasMany('App\Post', 'article_id');
    }
}
