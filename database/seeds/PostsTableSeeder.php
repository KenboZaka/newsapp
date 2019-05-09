<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = '投稿のダミーです。投稿のダミーです。投稿のダミーです。';

        for($i=0; $i<=15; $i++){
            $post = new Post;
            $post->article_id = $article->id;
            $post->user_id = $user->id;
            $post->content = $i.$content;
            $post->save();
    }
}
}
