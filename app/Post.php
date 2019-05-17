<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
use App\User;
use App\Comment;

class Post extends Model
{
    protected $fillable = [
        'article_id','user_id','content'
    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function articles(){
        return $this->belongsTo('App\Article', 'article_id');
    }
    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
   

}
