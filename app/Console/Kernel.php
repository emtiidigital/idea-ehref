<?php

namespace App\Console;

use App\Console\Commands\DownloadNewsFeedsCommand;
use App\Console\Commands\ProcessNewsFeedsCommand;
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
        ProcessNewsFeedsCommand::class,
        DownloadNewsFeedsCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(DownloadNewsFeedsCommand::class)
            ->dailyAt('22:00');

        $schedule->command(ProcessNewsFeedsCommand::class)
            ->dailyAt('23:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
