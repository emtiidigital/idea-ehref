<?php

namespace App\Console\Commands;

use App\Entities\NewsFeed;
use App\Events\ProcessNewsFeedsEvent;
use Illuminate\Console\Command;

/**
 * Class ProcessNewsFeedsCommand
 * @package App\Console\Commands
 */
class ProcessNewsFeedsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emtii:process_newsfeeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get latest news from newsfeeds the app subscribed to.';

    /**
     * Execute the console command, trigger an event for every
     * processed news feed.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $newsfeeds = NewsFeed::all();

        $feedCount = $newsfeeds->count();

        if ($feedCount > 0) {
            $this->info("Start processing {$feedCount} Newsfeeds.");

            $bar = $this->output->createProgressBar($feedCount);

            foreach ($newsfeeds as $newsfeed) {
                event(new ProcessNewsFeedsEvent($newsfeed));
                $bar->advance();
            }

            $bar->finish();
        }

        return true;
    }
}
