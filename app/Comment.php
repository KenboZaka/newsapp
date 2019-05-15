<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;

class Comment extends Model
{
    protected $fillable =[
        'post_id','user_id','content',
    ];

    public function posts(){
        return $this->belongsTo('App\Post', 'post_id','id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
