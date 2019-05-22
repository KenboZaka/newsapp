<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValiRequest;
use App\Post;
use App\Article;
use App\User;
use App\Like;

class PostController extends Controller
{

    public function store(ValiRequest $request){
        $post = new Post;
        $post->load('articles', 'users');

        $post->content = $request->content;
        $post->article_id = $request->article_id;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect("/article/$post->article_id");
    }

    public function show(Post $post){
        $my_like = Like::where('user_id', \Auth::id())->where('post_id', $post->id)->first();
        $is_like = isset($my_like);
        $like_count = Like::where('post_id', $post->id)->count();
        $post->load('users','likes');
        return view('posts.post_detail', ['post' => $post, 'is_like'=>$is_like, 'like_count'=>$like_count]);
    }

    public function edit(Post $post){
        return view('edit_post', ['post' => $post]);
    }

    public function update(ValiRequest $request, Post $post, Article $article){
        
        $post->load('users', 'articles');
        $post->content = $request->content;
        $post->article_id = $request->article_id;
        $post->user_id = \Auth::user()->id;
        $post->save();
        return redirect("/article/$post->article_id");
    }

    public function delete(Post $post){

        $post->delete();
        return redirect("/article/$post->article_id");
    }
}
