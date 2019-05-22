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

        $entertainment = 'CAAqJggKIiBDQkFTRWdvSUwyMHZNREpxYW5RU0FtcGhHZ0pLVUNnQVAB';
        $sport = 'CAAqJggKIiBDQkFTRWdvSUwyMHZNRFp1ZEdvU0FtcGhHZ0pLVUNnQVAB';

        // 取得するニュースのURL
        $url = 'https://news.google.com/rss/topics/' . $entertainment . '?hl=ja&gl=JP&ceid=JP%3Aja';
        $feed = file_get_contents($url);
        $rss = simplexml_load_string($feed);
        // foreach($rss->channel->item as $item) {
        //     dd($item);
        // }
        return view('index.index', ['articles' => $articles, 'rss'=>$rss]);
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

// 698ccc2205934cd996d267eb9b8b83c1