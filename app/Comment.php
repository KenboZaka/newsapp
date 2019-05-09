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
        return $this->belongsTo('App\Post');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
