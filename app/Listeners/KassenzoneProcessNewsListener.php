<?php

namespace App\Listeners;

use App\Events\ProcessNewsFeedsEvent;

class KassenzoneProcessNewsListener
{
    const NAME_OF_FEED = 'kassenzone_artikel';

    public function handle(ProcessNewsFeedsEvent $event)
    {
        $feedNameOfEvent = $event->newsfeed->getAttributeValue('name');

        if ($feedNameOfEvent !== $this->getNameOfFeedToAllowProceeding()) {
            return false;
        }

        return new Link(
            $this->getNameOfFeedToAllowProceeding(),
            $event
        );
    }

    private function getNameOfFeedToAllowProceeding(): string
    {
        return self::NAME_OF_FEED;
    }
}
