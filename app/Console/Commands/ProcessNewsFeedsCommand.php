<?php

namespace App\Console\Commands;

use App\Entities\NewsFeed;
use App\Events\ProcessNewsFeedsEvent;
use Illuminate\Console\Command;

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

        $newsfeedsCount = $newsfeeds->count();

        if ($newsfeedsCount > 0) {
            $this->info("Start processing {$newsfeedsCount} Newsfeeds.");

            $bar = $this->output->createProgressBar($newsfeedsCount);

            foreach ($newsfeeds as $newsfeed) {
                $this->info("Process {$newsfeed->name}");
                event(new ProcessNewsFeedsEvent($newsfeed));

                $bar->advance();
            }

            $bar->finish();
        }

        return true;
    }
}
