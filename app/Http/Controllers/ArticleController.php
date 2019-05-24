<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Post;
use GuzzleHttp\Client;

class ArticleController extends Controller
{
    public function index(){

        $client = new Client;
        $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=jp&category=sports&apiKey=698ccc2205934cd996d267eb9b8b83c1')->getBody()->getContents();
        $api_articles = array(json_decode($response))[0]->articles;
// dd($api_articles);

        for($i=0; $i<=4; $i++){
            foreach($api_articles as $api_article){
                $article = new Article;
                $article->title = $api_article->title;
                $article->description = $api_article->description;
                $article->image = $api_article->urlToImage;
                $article->url = $api_article->url;
                $article->publishedAt = $api_article->publishedAt;
                $article->save();
        }
        }
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

// 698ccc2205934cd996d267eb9b8b83c1


        // $entertainment = 'CAAqJggKIiBDQkFTRWdvSUwyMHZNREpxYW5RU0FtcGhHZ0pLVUNnQVAB';
        // $sport = 'CAAqJggKIiBDQkFTRWdvSUwyMHZNRFp1ZEdvU0FtcGhHZ0pLVUNnQVAB';

        // 取得するニュースのURL
        // $url = 'https://news.google.com/rss/topics/' . $entertainment . '?hl=ja&gl=JP&ceid=JP%3Aja';
        // $feed = file_get_contents($url);
        // $rss = simplexml_load_string($feed);

        // $articles = Article::all();
        // foreach($rss->channel->item as $item) {
        //     dd($item);
        // }

        // $entertainment = 'entertainment';
        // $sports = 'sports';
        // $business = 'business';

        // $genre = [$entertainment, $sports, $business];
        
        // foreach($genre as $insert_key){
        //     $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=jp&category='.$insert_key.'&apiKey=698ccc2205934cd996d267eb9b8b83c1')->getBody()->getContents();
        // }