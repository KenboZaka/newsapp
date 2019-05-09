<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
use App\User;

class Post extends Model
{
    protected $fillable = [
        'article_id','user_id','content'
    ];
    
    // public function create(){
    //     $post = Post::create([
    //         'article_id' => $article->id,
    //         'user_id' => auth()->id(),
    //         'content' =>'content'
    //     ]);
    // }
  

    public function articles(){
        return $this->belongsTo('App\Article');
    }
    public function users(){
        return $this->belongsTo('App\User');
    }

}
