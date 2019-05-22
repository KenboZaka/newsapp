<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;

class LikeController extends Controller
{
    public function store(Post $post, Request $request){

        $like = new Like;
        $like->load('users', 'posts');
        $like->user_id = \Auth::user()->id;
        $like->post_id = $post->id;
        $like->save();
        return redirect("/detail/$post->id");
    }

    public function delete(Post $post){

        // dd($post);
        $my_like = Like::where('user_id', \Auth::id())->where('post_id', $post->id)->first();
        $my_like->delete();

        return redirect("detail/$post->id");
    }
}