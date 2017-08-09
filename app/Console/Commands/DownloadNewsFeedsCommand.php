<?php

namespace App\Console\Commands;

use App\Entities\NewsFeed;
use App\Events\DownloadNewsFeedsEvent;
use Illuminate\Console\Command;

/**
 * Class DownloadNewsFeedsCommand
 * @package App\Console\Commands
 */
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
        $newsfeeds = NewsFeed::all();

        $feedCount = $newsfeeds->count();

        if ($feedCount > 0) {
            $bar = $this->output->createProgressBar($feedCount);

            $bar->clear();
            $this->info("Start downloading {$feedCount} feeds.");

            foreach ($newsfeeds as $newsfeed) {
                event(new DownloadNewsFeedsEvent($newsfeed));
                $bar->advance();
            }

            $bar->finish();
        }

        return true;
    }
}
