<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Post;

class ArticleController extends Controller
{
    public function index(Article $articles){
        $articles = Article::all();
        return view('index', ['articles' => $articles]);
    }

    public function show(Article $article){
        // if ログインしている場合
       
        if(Auth::check()){
            $posts = Post::where('article_id', $article->id)->orderBy('created_at','desc')->get();
        }else{
        // else ログインしていない場合
            $posts = Post::where('article_id', $article->id)->orderBy('created_at','desc')->limit(3)->get();
        }
        

        return view('detail_index', ['article'=>$article, 'posts' => $posts]);
    }
}
