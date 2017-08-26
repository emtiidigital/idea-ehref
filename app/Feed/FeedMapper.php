<?php

namespace App\Feed;

use App\Feed\Mapper\Adapter\BaseAdapter;

class FeedMapper
{
    const FEED_TO_CLASS = [
        'excitingcommerce.com' => ExcitingCommerceAdapter::class
    ];

    public static function getAdapterForWebsite($website)
    {
        $classes = collect(self::FEED_TO_CLASS);

        if ($classes->has($website)) {
            return new $classes->get($website);
        }

        return new BaseAdapter();
    }
}