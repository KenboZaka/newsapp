<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // herokuへのmigration時のMysqlエラー対処
        Schema::defaultStringLength(191);
        
        // 本番環境では、httpsでリンクを作成
        if (\App::environment('production')) {
            \URL::forceScheme('https');       
        }
    }
}
