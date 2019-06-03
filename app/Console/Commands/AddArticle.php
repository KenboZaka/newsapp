<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Article;

class AddArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:AddArticle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client;
        $sports = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=jp&category=sports&apiKey=698ccc2205934cd996d267eb9b8b83c1')->getBody()->getContents();
        $sp_articles = array(json_decode($sports))[0]->articles;

        foreach($sp_articles as $sp_article){
            $article = new Article;
            $article->title = $sp_article->title;
            $article->description = $sp_article->description;
            $article->genre = 1;
            $article->image = $sp_article->urlToImage;
            $article->url = $sp_article->url;
            $article->publishedAt = $sp_article->publishedAt;
            
            // 文字化けがあった場合は削除
            if(preg_match('/��/', $article->description)){
            $article->delete();
            }else{
            $article->save();
            }
        }

        $client = new Client;
        $ent = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=jp&category=entertainment&apiKey=698ccc2205934cd996d267eb9b8b83c1')->getBody()->getContents();
        $ent_articles = array(json_decode($ent))[0]->articles;

        foreach($ent_articles as $ent_article){
            $article = new Article;
            $article->title = $ent_article->title;
            $article->description = $ent_article->description;
            $article->genre = 2;
            $article->image = $ent_article->urlToImage;
            $article->url = $ent_article->url;
            $article->publishedAt = $ent_article->publishedAt;
                
            // 文字化けがあった場合は削除
            if(preg_match('/��/', $article->description)){
            $article->delete();
            }else{
            $article->save();
            }
        }

        $client = new Client;
        $business = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=jp&category=business&apiKey=698ccc2205934cd996d267eb9b8b83c1')->getBody()->getContents();
        $bus_articles = array(json_decode($business))[0]->articles;

        foreach($bus_articles as $bus_article){
            $article = new Article;
            $article->title = $bus_article->title;
            $article->description = $bus_article->description;
            $article->genre = 3;
            $article->image = $bus_article->urlToImage;
            $article->url = $bus_article->url;
            $article->publishedAt = $bus_article->publishedAt;
            
            // 文字化けがあった場合は削除
            if(preg_match('/��/', $article->description)){
            $article->delete();
            }else{
            $article->save();
            }
        }
    }
}
