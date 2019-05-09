<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = '記事の内容です。シーダー使用でダミーを作成しています。APIを使用する予定です。';

        for($i=0; $i<=15; $i++){
            $article = new Article;
            $article->title = $i.'番目のタイトルです';
            $article->content = $i.$content;
            $article->save();
        }
    }
}
