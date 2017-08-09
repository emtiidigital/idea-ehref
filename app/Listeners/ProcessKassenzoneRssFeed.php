<?php

namespace App\Listeners;

use App\Entities\Link;
use App\Entities\LinkDetails;
use App\Entities\LinkFqdn;
use App\Entities\LinkLabel;
use App\Events\ProcessNewsFeedsEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;

/**
 * Class ProcessKassenzoneRssFeed
 * @feed Artikel https://www.kassenzone.de/feed/
 * @feed Podcasts http://feeds.soundcloud.com/users/soundcloud:users:51907160/sounds.rss
 * @package App\Listeners
 */
class ProcessKassenzoneRssFeed
{
    /**
     * Directory relative to storage root of this app,
     * used to download all newsfeeds into it.
     */
    const PATH_TO_FILE = './newsfeeds/';
    const NAME_OF_FEED = 'kassenzone_artikel';

    /**
     * Load file from filesystem, process file and
     * persist prepared data to our db.
     *
     * @param  ProcessNewsFeedsEvent $event
     */
    public function handle(ProcessNewsFeedsEvent $event)
    {
        $xml = null;

        $feedName = $event->newsfeed->getAttributeValue('name');

        /**
         * if event is available, load file from storage
         * and return its rss / xml data as an array.
         */
        if ($feedName === self::NAME_OF_FEED) {
            $xml = $this->loadFileFromStorage(
                $event->newsfeed->getAttributeValue('local_file')
            );
        }

        if ($xml !== null) {
            /** @var SimpleXMLElement $item */
            foreach ($xml->channel->item as $item) {

                // create new Link
                $link = new Link([
                   'published_at' => pubDate
                ]);

                // set link details out of item
                $linkDetails = new LinkDetails([
                    'name' => title
                    'locale' =>
                ]);

                // set link fqdn out of item
                $linkFqdn = new LinkFqdn([
                    'protocol' =>
                    'third_level_label' =>
                    'second_level_label' =>
                    'top_level_domain' =>
                    'deeplink' =>
                    'full_qualified_link' => link
                ]);

                // set link label out of item
                $linkLabel = new LinkLabel([
                    'label_id' => category
                ]);

                DB::transaction(function () use (
                    $link,
                    $linkDetails,
                    $linkFqdn,
                    $linkLabel
                ) {
                    $link->save();
                    Link::find($link->id)->details()->save($linkDetails);
                    Link::find($link->id)->fqdn()->save($linkFqdn);
                    Link::find($link->id)->label()->save($linkLabel);
                });
            }
        }

        //$this->processFile($file);
        //$this->saveNewLinks();
    }

    /**
     * @param $filename
     *
     * @return SimpleXMLElement
     */
    private function loadFileFromStorage($filename): SimpleXMLElement
    {
        $file = Storage::get(self::PATH_TO_FILE . $filename);

        return simplexml_load_string($file);
    }
}
