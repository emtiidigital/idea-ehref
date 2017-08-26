<?php

namespace App\Providers;

use App\Events\DownloadNewsFeedsEvent;
use App\Events\ProcessNewsFeedsEvent;
use App\Feed\Feed;
use App\Listeners\ProcessExcitingCommerceArtikelRssFeed;
use App\Listeners\ProcessKassenzonePodcastRssFeed;
use App\Listeners\SaveNewsFeedToStorage;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        DownloadNewsFeedsEvent::class => [
            SaveNewsFeedToStorage::class
        ],
        ProcessNewsFeedsEvent::class => [
            Feed::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
