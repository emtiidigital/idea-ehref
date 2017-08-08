<?php

namespace App\Events;

use App\Entities\NewsFeed;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

/**
 * Class ProcessNewsFeedsEvent
 * @package App\Events
 */
class ProcessNewsFeedsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var NewsFeed */
    public $newsfeed;

    /**
     * Create a new event instance.
     *
     * @param NewsFeed $newsfeed
     */
    public function __construct(NewsFeed $newsfeed)
    {
        $this->newsfeed = $newsfeed;
    }
}
