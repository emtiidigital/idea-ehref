<?php

namespace App\Feed;

use App\Exceptions\UnknownFileLoaderException;
use App\Feed\FileLoader\XmlFeedFileLoader;
use App\Feed\FileLoader\RssFeedFileLoader;

class FeedLoader
{
    /**
     * Directory relative to storage root of this app,
     * used to download all newsfeeds into it.
     */
    const PATH_TO_FILE = './newsfeeds/';

    public static function getFileForWebsite($fileName, $fileFormat)
    {
        if ($fileFormat === 'rss') {
            return new RssFeedFileLoader(
                static::getPathToFile($fileName)
            );
        }

        if ($fileFormat === 'xml') {
            return new XmlFeedFileLoader(
                static::getPathToFile($fileName)
            );
        }

        throw new UnknownFileLoaderException(
            $fileFormat . ' not found. Could not load correct file loader.'
        );
    }

    private static function getPathToFile($fileName)
    {
        return self::PATH_TO_FILE . $fileName;
    }
}
