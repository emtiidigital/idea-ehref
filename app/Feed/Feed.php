<?php

namespace App\Feed;

use App\Events\ProcessNewsFeedsEvent;

class Feed
{
    /**
     * @var ProcessNewsFeedsEvent
     */
    private $event;
    /**
     * @var FeedProcessor
     */
    private $feedProcessor;

    public function __construct(
        ProcessNewsFeedsEvent $event,
        FeedProcessor $feedProcessor
    ) {
        $this->event = $event;
        $this->feedProcessor = $feedProcessor;
    }

    public function handle()
    {
        // need to check which file we have to load
        $fileLoader = FeedLoader::getFileForWebsite(
            $this->getEventFileName(),
            $this->getEventFileFormat()
        );

        foreach ($fileLoader->getNode('item') as $item) {
            // need to check for needed mapper
            $link = FeedMapper::getAdapterForWebsite(
                $this->getEventWebsite()
            );

            $this->feedProcessor->saveNewLink(
                $link
            );
        }
    }

    private function getEventNewsfeed()
    {
        return $this->event->newsfeed;
    }

    private function getEventFileName()
    {
        return $this
            ->getEventNewsfeed()
            ->getAttributeValue('local_file_name');
    }

    private function getEventFileFormat()
    {
        return $this
            ->getEventNewsfeed()
            ->getAttributeValue('local_file_format');
    }

    private function getEventWebsite()
    {
        return $this
            ->getEventNewsfeed()
            ->getAttributeValue('website');
    }
}
