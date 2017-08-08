<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadNewsFeedsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emtii:download_newsfeeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Downloads newsfeeds to local storage.';

    /**
     * Downloads all newsfeeds of news the app subscribed to.
     *
     * @return bool
     */
    public function handle()
    {
        //
    }
}
