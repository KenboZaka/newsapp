<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Article;
use App\User;

class PostController extends Controller
{
    

    public function create(Request $request, Article $article, User $user){
 
        $user = User::first();

        $post = new Post;
        $post->content = $request->content;
        $post->article_id = $article->id;
        $post->user_id = $user->id;
        $post->save();
        return redirect("/article/$post->article_id");
    }

    public function show(Post $post){
        return view('post_detail', ['post' => $post]);
    }

    public function edit(Post $post){
        return view('edit_post', ['post' => $post]);
    }

    public function update(Request $request, Post $post, Article $article){
        
        $user = User::first();
        $post->content = $request->content;
        // $post->article_id = $article->id;
        $post->user_id = $user->id;
        $post->save();
        return redirect("/detail/$post->id");
    }

    public function delete(Post $post){

        $post->delete();
        return redirect("/article/$post->article_id");
    }
}
