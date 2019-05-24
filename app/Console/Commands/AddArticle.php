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
        $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=jp&category=sports&apiKey=698ccc2205934cd996d267eb9b8b83c1')->getBody()->getContents();
        $api_articles = array(json_decode($response))[0]->articles;

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
}
