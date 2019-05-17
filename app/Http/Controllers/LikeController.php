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
        return redirect("/detail/$post->id")->with('like',$like);

        // , ['like'=>$like]
    }
}

		// $posts = Post::latest()->where('category_id', $q['category_id'])->paginate(5);
		// $posts->load('categories', 'users');
		// return view('posts.index', [
		// 	'posts'=>$posts, 
		// 	'category_id' => $q['category_id']