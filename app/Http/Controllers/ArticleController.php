<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Article;
use App\Post;
use App\User;


class ArticleController extends Controller
{

    public function index(){
=======

    public function index(Article $article){
        
        $article->load('posts');
>>>>>>> Stashed changes
        $articles = Article::all();
        return view('index.index', ['articles' => $articles]);
    }


    public function show(Article $article){
        // if ログインしている場合
        if(Auth::check()){
            $posts = Post::where('article_id', $article->id)->orderBy('created_at','desc')->get();
        }else{
        // else ログインしていない場合
            $posts = Post::where('article_id', $article->id)->orderBy('created_at','desc')->limit(3)->get();
        }

        return view('index.detail_index', ['article'=>$article, 'posts' => $posts]);
    }

    
}