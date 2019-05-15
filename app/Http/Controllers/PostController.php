<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValiRequest;
use App\Post;
use App\Article;
use App\User;

class PostController extends Controller
{
    

    public function create(ValiRequest $request){
 
        // $user = User::first();
        // dd($request);
        $post = new Post;
        $post->load('articles', 'users');

        $post->content = $request->content;
        $post->article_id = $request->article_id;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect("/article/$post->article_id");
    }

    public function show(Post $post){
        $post->load('users');
        return view('post_detail', ['post' => $post]);
    }

    public function edit(Post $post){
        return view('edit_post', ['post' => $post]);
    }

    public function update(ValiRequest $request, Post $post, Article $article){
        
        $user = User::first();
        $post->content = $request->content;
        // $post->article_id = $article->id;
        $post->user_id = $user->id;
        $post->save();
        return redirect("/article/$post->article_id");
    }

    public function delete(Post $post){

        $post->delete();
        return redirect("/article/$post->article_id");
    }
}
