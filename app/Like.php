<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Like extends Model
{
    protected $fillable =[
        'user_id','post_id'
    ];

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function posts(){
        return $this->belongsTo('App\Post', 'post_id');
    }
}
