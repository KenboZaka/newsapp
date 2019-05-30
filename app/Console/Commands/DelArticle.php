<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class DelArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DelArticle';

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
        DB::table('articles')->where("genre", "1")->oldest()->limit(140)->delete();
        DB::table('articles')->where("genre", "2")->oldest()->limit(140)->delete();
        DB::table('articles')->where("genre", "3")->oldest()->limit(140)->delete();
    }
}
