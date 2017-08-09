<?php

namespace App\Listeners;

use App\Events\ProcessNewsFeedsEvent;

/**
 * Class ProcessKassenzoneRssFeed
 * @feed Artikel https://www.kassenzone.de/feed/
 * @feed Podcasts http://feeds.soundcloud.com/users/soundcloud:users:51907160/sounds.rss
 * @package App\Listeners
 */
class ProcessKassenzoneRssFeed
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Load file from filesystem, process file, add needed data to our db.
     *
     * @param  ProcessNewsFeedsEvent $event
     */
    public function handle(ProcessNewsFeedsEvent $event)
    {
        $event->newsfeed->getAttributes();

        $this->loadFileFromStorage();
        $this->processFile();
        $this->saveNewLinks();
    }
}
