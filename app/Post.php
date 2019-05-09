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
        return $this->belongsTo('App\Article');
    }
    public function users(){
        return $this->belongsTo('App\User');
    }
   

}
