<?php

namespace App\Listeners;

use App\Events\ProcessNewsFeedsEvent;
use App\Listeners\Kassenzone\ExcitingCommerceArtikelMapper;
use App\Repositories\LinkRepository;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;

/**
 * Class ProcessExcitingCommerceArtikelRssFeed
 * @feed Artikel https://excitingcommerce.de/feed/
 * @package App\Listeners
 */
class ProcessExcitingCommerceArtikelRssFeed
{
    /**
     * We need this prefix to make sure
     * this feed has its own number
     */
    const PREFIX_EXTERNAL_ID = 'kassenzone_artikel-';

    /**
     * Directory relative to storage root of this app,
     * used to download all newsfeeds into it.
     */
    const PATH_TO_FILE = './newsfeeds/';

    /**
     * Determines the name of the feed where this Listener
     * is assigned to. We read this name out of the database
     * and start our processing if the assignment is correct.
     */
    const NAME_OF_FEED = 'kassenzone_artikel';

    /** @var LinkRepository */
    private $linkRepository;

    /**
     * ProcessKassenzoneRssFeed constructor.
     *
     * @param LinkRepository $linkRepository
     */
    public function __construct(
        LinkRepository $linkRepository
    ) {
        $this->linkRepository = $linkRepository;
    }

    /**
     * Load file from filesystem, process file and
     * persist prepared data to our db.
     *
     * @param  ProcessNewsFeedsEvent $event
     */
    public function handle(ProcessNewsFeedsEvent $event): void
    {
        $xml = null;

        /**
         * If event is available, load file from storage
         * and return its rss / xml data as an array.
         */
        $feedName = $event->newsfeed->getAttributeValue('name');

        if ($feedName === self::NAME_OF_FEED) {
            $xml = $this->loadFileFromStorage(
                $event->newsfeed->getAttributeValue('local_file')
            );
        }

        /**
         * if we do have an SimpleXMLObject we have to iterate
         * over those items, map the fields and save new links
         * to our database.
         */
        if ($xml !== null) {
            /** @var SimpleXMLElement $item */
            foreach ($xml->channel->item as $item) {
                $external_id = (string) self::PREFIX_EXTERNAL_ID . $item->{'post-id'};

                $linkInDb = $this->linkRepository->getLinkByExternalId($external_id);

                if ($linkInDb !== true) {
                    $mapper = $this->getKassenzoneArtikelMapper($item);
                    $this->saveNewLinks($mapper);
                }
            }
        }
    }

    /**
     * Load file from app storage.
     *
     * @param $filename
     * @return SimpleXMLElement
     */
    private function loadFileFromStorage($filename): SimpleXMLElement
    {
        $file = Storage::get(self::PATH_TO_FILE . $filename);

        return simplexml_load_string($file);
    }

    /**
     * Get Mapper for explicit "Artikel RSS Feed" of Kassenzone.
     *
     * @param $item
     *
     * @return ExcitingCommerceArtikelMapper
     */
    private function getKassenzoneArtikelMapper($item ): ExcitingCommerceArtikelMapper
    {
        return new ExcitingCommerceArtikelMapper($item);
    }

    /**
     * Save new Links to Database by calling
     * save method in Link Repositor.
     *
     * @param ExcitingCommerceArtikelMapper $mapper
     */
    private function saveNewLinks( ExcitingCommerceArtikelMapper $mapper): void
    {
        $this->linkRepository->saveNewLink(
            $mapper->getMappedLink(),
            $mapper->getMappedLinkDetails(),
            $mapper->getMappedLinkFqdn()
        );
    }
}
