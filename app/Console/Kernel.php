<?php

namespace App\Console;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\AddArticle::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       
        $schedule->command('command:AddArticle')
                    ->dailyAt('13:00');

        // $schedule->call(function(){
        //             DB::table('articles')->delete();})->everyMinute();
                // ->quarterly();
=======
       
        $schedule->command('command:AddArticle')->dailyAt('13:00');
                            // ->everyMinute();
                        // ->everyFiveMinutes();
                    // 

        $schedule->call(function(){
                    DB::table('articles')->delete();})->quarterly();
                    // ->everyFiveMinutes();
>>>>>>> Stashed changes
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
